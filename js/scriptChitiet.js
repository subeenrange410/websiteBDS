const propertyId = sessionStorage.getItem('propertyId');

fetch('Getdata_BDS.php')
.then(response => response.json())
.then(data => {
        const properties = data;
        const Thongtinchitiet = document.querySelector("#Thongtinchitiet");

        // Clear previous search results
        Thongtinchitiet.innerHTML = "";

        let resultCount = 0;
        
        // Create a card for each property and append it to the container
        properties.forEach(property => {
            if (property.id === propertyId) {
                const card = document.createElement("div");
                card.classList.add("propertyCard");
                card.innerHTML = `
                        <div class="propertyDetails">
                            <img id="image_BDS" src="${property.image}" alt="${property.title}">
                            <h3>${property.title}</h3>
                            <p><strong>Địa chỉ nhà đất: </strong>${property.city} | ${property.district} | ${property.ward}</p>
                            <p><strong>Nhà Đất </strong>${property.type === 'ban' ? 'bán' : 'cho thuê'}</p>
                            <p>${property.note}</p>
                        </div>

                `;
                Thongtinchitiet.appendChild(card);
                resultCount++;
            }
        });
        

        // Show message if no result found
        if (resultCount === 0) {
            const noResultMessage = document.createElement("p");
            noResultMessage.textContent = "Không tìm thấy kết quả phù hợp";
            Thongtinchitiet.appendChild(noResultMessage);
        }
        // Show message if multiple results found
        else if (resultCount > 1) {
            const multipleResultMessage = document.createElement("p");
            multipleResultMessage.textContent = `Tìm thấy ${resultCount} kết quả, chỉ hiển thị kết quả đầu tiên`;
            Thongtinchitiet.appendChild(multipleResultMessage);
        }
}).catch(error => console.error(error));