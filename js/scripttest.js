let propertyType = ""; // biến để lưu trữ loại bất động sản

document.getElementById("forRent").addEventListener("click", () => {
  propertyType = "forRent";
  document.getElementById("forRent").classList.add("selected");
  document.getElementById("forSale").classList.remove("selected");
});

document.getElementById("forSale").addEventListener("click", () => {
  propertyType = "forSale";
  document.getElementById("forSale").classList.add("selected");
  document.getElementById("forRent").classList.remove("selected");
});

document.getElementById("searchButton").addEventListener("click", () => {
  let city = document.getElementById("city").value;
  let district = document.getElementById("district").value;
  let ward = document.getElementById("ward").value;

  // sử dụng giá trị của biến propertyType để thêm vào yêu cầu tìm kiếm
  let searchQuery = `${propertyType}?city=${city}&district=${district}&ward=${ward}`;
  
  // thực hiện tìm kiếm với yêu cầu tìm kiếm searchQuery
});
