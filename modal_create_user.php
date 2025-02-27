<?php
ob_start(); // Start output buffering 
include('dbcon.php');
// Handle form submission
if (isset($_POST['create'])) {
  $user_name = $_POST['user_name'];
  $role = $_POST['role'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  // Check if the username already exists
  $check_query = "SELECT * FROM users WHERE user_name = ?";
  $stmt = $con->prepare($check_query);
  $stmt->bind_param("s", $user_name);
  $stmt->execute();
  $result = $stmt->get_result();
  if ($result->num_rows > 0) {
    // Username already exists
    $error_msg = "Jina la mtumiaji limechukuliwa";
  } else {
    // Insert new user
    $insert_query = "INSERT INTO users (user_name, role, password) VALUES (?, ?, ?)";
    $stmt = $con->prepare($insert_query);
    $stmt->bind_param("sss", $user_name, $role, $password);
    $stmt->execute();
    // Redirect to the same page to reflect changes
    header("Location: user_management.php");
    exit(); // Ensure no further code is executed after the redirect
  }
}
ob_end_flush(); // End output buffering
?>
  <div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createUserModalLabel">Ongeza Mtumiaji Mpya</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" enctype="multipart/form-data">
            <!-- Username Field -->
            <div class="form-group">
              <label for="user_name">Jina la mtumiaji:</label>
              <input type="text" name="user_name" placeholder="Ingiza jina la mtumiaji" class="form-control" required>
            </div>
            <!-- Role Dropdown -->
            <div class="form-group">
              <label for="role">Wajibu:</label>
              <select name="role" class="form-control" required>
                <option value="">Chagua wajibu</option>
                <option value="cashier">Cashier</option>
                <option value="admin">Admin</option>
              </select>
            </div>
            <!-- Password Field -->
            <div class="form-group">
              <label for="password">Neno la siri:</label>
              <input type="password" name="password" placeholder="Ingiza neno la siri" class="form-control" required>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
              <button type="submit" name="create" class="btn btn-primary">Ongeza</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Kata</button>
            </div>
            <!-- Error Message -->
            <div id="error-msg" class="error-msg" style="color: red; text-align: center;">
              <?php echo isset($error_msg) ? $error_msg : ''; ?>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>