const propertyIdNDT = sessionStorage.getItem('idNdt');

fetch('Getdata_NDT.php')
.then(response => response.json())
.then(data => {
        const properties = data;
        const ThongtinchitietNDT = document.querySelector("#ThongtinchitietNDT");

        // Clear previous search results
        ThongtinchitietNDT.innerHTML = "";

        let resultCount = 0;
        
        // Create a card for each property and append it to the container
        properties.forEach(property => {
            if (property.ID_NDT === propertyIdNDT) {

                const card = document.createElement("div");
                card.classList.add("propertyCard");
                card.innerHTML = `
                        <div class="propertyDetails">
                        <h1><strong>Nhà đầu tư: </strong></h1>
                            <p><strong>Họ và tên: </strong>${property.HOVATEN}</p>
                            <p><strong>Mã số thuế: </strong>${property.MASOTHUE}</p>
                            <p><strong>Căn cước công dân: </strong>${property.CCCD}</p>
                            <p><strong>Số điện thoại liên hệ: </strong>${property.SDT}</p>
                        </div>

                `;
                ThongtinchitietNDT.appendChild(card);
                resultCount++;
            }
        });
        

        // Show message if no result found
        if (resultCount === 0) {
            const noResultMessage = document.createElement("p");
            noResultMessage.textContent = "Không tìm thấy kết quả phù hợp";
            ThongtinchitietNDT.appendChild(noResultMessage);
        }
        // Show message if multiple results found
        else if (resultCount > 1) {
            const multipleResultMessage = document.createElement("p");
            multipleResultMessage.textContent = `Tìm thấy ${resultCount} kết quả, chỉ hiển thị kết quả đầu tiên`;
            ThongtinchitietNDT.appendChild(multipleResultMessage);
        }
}).catch(error => console.error(error));