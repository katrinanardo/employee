$(document).ready(function () {
  $.ajax({
    url: 'api/read.php',
    method: 'GET',
    dataType: 'json',
    success: function (data) {
      let rows = '';
      $.each(data, function (i, emp) {
        rows += `<tr data-emp-code="${emp.emp_code}">
          <td class="px-4 py-2">${emp.emp_code}</td>
          <td class="px-4 py-2">${emp.lastname}</td>
          <td class="px-4 py-2">${emp.firstname}</td>
          <td class="px-4 py-2">${emp.birthday}</td>
          <td class="px-4 py-2">${emp.sex}</td>
          <td class="px-4 py-2">${emp.address}</td>
          <td class="px-4 py-2 space-x-2">
            <a href="edit.html?emp_code=${emp.emp_code}" class="text-blue-600 hover:underline">Edit</a>
            <button class="delete-btn text-red-600 hover:underline">Delete</button>
          </td>
        </tr>`;
      });
      $('#employeeTableBody').html(rows);
    },
    error: function (xhr, status, error) {
      console.error("AJAX error:", status, error);
      console.log("Response text:", xhr.responseText);
    }
  });
});
  
    $('#employeeTable').on('click', '.delete-btn', function () {
      const empCode = $(this).closest('tr').data('emp-code');
      if (confirm('Are you sure you want to delete this employee?')) {
        $.ajax({
          url: 'api/delete.php',
          method: 'POST',
          data: { emp_code: empCode },
          success: function (response) {
            alert('Employee deleted successfully!');
            location.reload();
          },
          error: function (xhr) {
            alert('Delete failed: ' + xhr.responseText);
          }
        });
      }
    });     

  

$('#cancelButton').on('click', function () {
    window.location.href = 'index.html';
});

$('#addForm').submit(function (e) {
    e.preventDefault();
    $.ajax({
      url: 'api/create.php',
      method: 'POST',
      data: $(this).serialize(),
      success: function (res) {
        alert('Employee added successfully!');
        window.location.href = 'index.html';
      },
      error: function () {
        alert('Error adding employee.');
      }
    });
  });


    $('#printButton').on('click', function () {
      let printContent = $('#employeeTable').html();  // Get the table content
      let printWindow = window.open('', '', 'height=600,width=800');  // Open a new window
      printWindow.document.write('<html><head><title>Employee List</title></head><body>');
      printWindow.document.write('<h1>Employee List</h1>');
      printWindow.document.write('<table border="1">');
      printWindow.document.write(printContent);  // Insert table content into the new window
      printWindow.document.write('</table>');
      printWindow.document.write('</body></html>');
      printWindow.document.close();
      printWindow.print();  // Trigger the print dialog
    });