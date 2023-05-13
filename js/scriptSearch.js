//tạo mảng trống 
const host = "https://provinces.open-api.vn/api/";
let cityList = [];
let districtList = [];
let wardList = [];

//hàm cập nhập data cho select
function renderOptionList(array, select) {
let options = '<option disable value="">Chọn</option>';

array.forEach((element) => {
options += '<option data-id="' + element.code + '" value="' + element.name + '">' + element.name + '</option>';
});
document.querySelector("#" + select).innerHTML = options;
}

//hàm lấy ds tỉnh
function fetchCityList() {
    fetch(host + "?depth=1")
    .then(function(response) { return response.json(); })
    .then(function(data) 
    {
     cityList = data;
     renderOptionList(cityList, "city");
    })
    .catch(function(error) { console.log('Có lỗi trong việc lấy danh sách tỉnh!!!!!!!!'); });
}

//hàm lấy ds tp
function fetchDistrictList(cityCode) {  
    return fetch(host + "p/" + cityCode + "?depth=2")  // truy vấn thông tin quận/huyện/tp của tỉnh
    .then(function(response) { return response.json(); })
    .then(function(data) 
    {  
     districtList = data.districts;
     renderOptionList(districtList, "district");
    })
    .catch(function(error) { console.log('Có lỗi trong việc lấy danh sách quận/huyện/tp!!!!!!!!'); });
}

//hàm lấy ds phường
function fetchWardList(districtCode) {
    fetch(host + "d/" + districtCode + "?depth=2") // truy vấn thông tin phường/xã của quận/huyện/tp
    .then(function(response) { return response.json(); })
    .then(function(data) 
    {
      wardList = data.wards;
      renderOptionList(wardList, "ward");
    })
   .catch(function(error) { console.log('Có lỗi trong việc lấy danh sách phường/xã!!!!!!!!'); });
}

//hàm hiện ra những gì đã chọn
function printResult() {
    const selectedCity = document.querySelector("#city option:checked");
    const selectedDistrict = document.querySelector("#district option:checked");
    const selectedWard = document.querySelector("#ward option:checked");
    const selectedType = document.querySelector("input[name='house-type']:checked");

    fetch('Getdata_BDS.php')
    .then(response => response.json())
    .then(data => {
        const properties = data;
        // sử dụng properties ở đây

        if (selectedCity && selectedDistrict && selectedWard && selectedType) {        
            const result = selectedCity.textContent + " | " + selectedDistrict.textContent + " | " + selectedWard.textContent + " | " + selectedType.value; 
            document.querySelector("#result").textContent = result;
            const propertyContainer = document.querySelector("#propertyContainer");

            // Clear previous search results
            propertyContainer.innerHTML = "";

            let resultCount = 0;
            
            // Create a card for each property and append it to the container
            properties.forEach(property => {
                if (property.city === selectedCity.textContent && property.district === selectedDistrict.textContent && property.ward === selectedWard.textContent && property.type === selectedType.value) {
                    const card = document.createElement("div");

                    card.classList.add("propertyCard");
                    card.innerHTML = `
                            <div class="propertyDetails">
                                <img id="image_BDS" src="${property.image}" alt="${property.title}">
                                <h3>${property.title}</h3>
                                <p>${property.city} | ${property.district} | ${property.ward}</p>
                                <p>${property.type}</p>
                                <p id="des_gia">${property.price}</p>
                                <div id="des_btn">
                                <button class="btn_xemchitiet_BDS" data-id-ndt="${property.ID_NDT}" value="${property.id}" onclick="goToChitiet(event)">Xem chi tiết</button>
                                </div>
                            </div>
                    `; 
                    propertyContainer.appendChild(card);
                    resultCount++;
                }
            });
            

            // Show message if no result found
            if (resultCount === 0) {
                const noResultMessage = document.createElement("p");
                noResultMessage.textContent = "Không tìm thấy kết quả phù hợp";
                propertyContainer.appendChild(noResultMessage);
            }
            // Show message if multiple results found
            else if (resultCount > 1) {
                const multipleResultMessage = document.createElement("p");
                multipleResultMessage.textContent = `Tìm thấy ${resultCount} kết quả, chỉ hiển thị kết quả đầu tiên`;
                propertyContainer.appendChild(multipleResultMessage);
            }
        }
    }).catch(error => console.error(error));
}

function goToChitiet(event) {
    const id = event.target.value;
    const id_ndt = event.target.dataset.idNdt;
    sessionStorage.setItem('propertyId', id);
    sessionStorage.setItem('idNdt', id_ndt);
    window.open("Chitiet.php", "_blank");
}

  
//sau khi web tải xong thì thực hiện hàm
document.addEventListener("DOMContentLoaded", fetchCityList);

//cập nhập tp sau khi chọn tỉnh
document.querySelector("#city").addEventListener("change", function(event) {
    fetchDistrictList(event.target.selectedOptions[0].dataset.id);
});

//cập nhập phường sau khi chọn tp
document.querySelector("#district").addEventListener("change",  function(event) {
fetchWardList(event.target.selectedOptions[0].dataset.id);
});

const searchButton = document.querySelector("#searchButton");
searchButton.addEventListener("click", printResult);
