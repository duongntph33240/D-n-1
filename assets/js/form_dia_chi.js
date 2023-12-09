const forms = document.getElementById("form_dia_chi");
const show = document.getElementById("show_dia_chi");
const huyButton = document.getElementById("huy");
const themButton = document.getElementById("them");
const submitButton = document.getElementById("submitButton");
const tbody_dia_chi = document.getElementById("tbody_dia_chi");

// Ngăn chặn sự kiện gửi form mặc định
forms.onsubmit = (e) => {
  e.preventDefault();
};

function them() {
  forms.style.display = "block";
  show.style.display = "none";
}

function submit() {
  // Get the input element by ID
  var diaChiInput = document.getElementById("dia_chi");

  // Get the value from the input element
  var diaChiValue = diaChiInput.value;

  // Check if the address is not empty
  if (!diaChiValue.trim()) {
    alert("Vui lòng nhập địa chỉ.");
    return;
  }

  // Create an object with the data to be sent
  var productInfo = {
    dia_chi: diaChiValue,
    // Add other information if needed
  };

  // Use AJAX to send data to the server
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "api/dia_chi/add_dia_chi.php", true);
  xhr.setRequestHeader("Content-Type", "application/json");

  // Set up the callback function for handling the response
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        // Handle the result from the server if needed
        // Xử lý kết quả từ máy chủ nếu cần
        tbody_dia_chi.innerHTML = xhr.response;
        alert("Đã thêm mới một địa chỉ");
        // You can update the content of an element with ID "card" here if needed
      } else {
        // Handle errors
        alert("Có lỗi xảy ra khi thêm vào giỏ hàng");
      }
    }
  };
  // Convert the data object to a JSON string before sending
  var jsonData = JSON.stringify(productInfo);

  // Send the request with the JSON data
  xhr.send(jsonData);

  // Clear the input field after the form is submitted
  diaChiInput.value = "";
  huy();
  // Optionally, you can call a function like 'huy()' here if needed
}

function huy() {
  forms.style.display = "none";
  show.style.display = "block";
}

themButton.onclick = them;
huyButton.onclick = huy;
submitButton.onclick = submit;

function pick(id) {
  // Create an object with the data to be sent
  var productInfo = {
    id: id,
    // Add other information if needed
  };

  // Use AJAX to send data to the server
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "api/dia_chi/vote_dia_chi.php", true);
  xhr.setRequestHeader("Content-Type", "application/json");

  // Set up the callback function for handling the response
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        // Xử lý kết quả từ máy chủ nếu cần
        // var response = JSON.parse(xhr.responseText);
        tbody_dia_chi.innerHTML = xhr.response;
        alert("Thay đổi địa chỉ thành công");
        // You can update the content of an element with ID "card" here if needed
      } else {
        // Handle errors
        alert("Có lỗi xảy ra khi thêm vào giỏ hàng");
      }
    }
  };

  // Convert the data object to a JSON string before sending
  var jsonData = JSON.stringify(productInfo);

  // Send the request with the JSON data
  xhr.send(jsonData);
}
function remo(id) {
  // Create an object with the data to be sent
  var productInfo = {
    id: id,
    // Add other information if needed
  };

  // Use AJAX to send data to the server
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "api/dia_chi/delete_dia_chi.php", true);
  xhr.setRequestHeader("Content-Type", "application/json");

  // Set up the callback function for handling the response
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        // Xử lý kết quả từ máy chủ nếu cần
        // var response = JSON.parse(xhr.responseText);
        tbody_dia_chi.innerHTML = xhr.response;
        alert("Xóa địa chỉ thành công");
        // You can update the content of an element with ID "card" here if needed
      } else {
        // Handle errors
        alert("Có lỗi xảy ra khi thêm vào giỏ hàng");
      }
    }
  };

  // Convert the data object to a JSON string before sending
  var jsonData = JSON.stringify(productInfo);

  // Send the request with the JSON data
  xhr.send(jsonData);
}
