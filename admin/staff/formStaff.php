<div class="mb-3">
    <label for="staff_fname" class="form-label">first name</label>
    <input type="text" class="form-control" id="staff_fname" name="staff_fname" value="<?php echo $staff_fname ?>">
</div>
<div class="mb-3">
    <label for="staff_lname" class="form-label">last name</label>
    <input type="text" class="form-control" id="staff_lname" name="staff_lname" value="<?php echo $staff_lname ?>">
</div>
<div class="mb-3">
    <label for="staff_username" class="form-label">user name</label>
    <input type="text" class="form-control" id="staff_username" name="staff_username" value="<?php echo $staff_username ?>">
</div>
<!-- <div class=" mb-3">
    <label for="staff_specialization" class="form-label">specialization</label>
    <input type="text" class="form-control" id="staff_specialization" name="staff_specialization" value="<?php echo $staff_specialization ?>">
</div> -->
<div class="input-group mb-3">
    <label class="input-group-text" for="inputGroupSelect01">specialization</label>
    <select class="form-select" id="inputGroupSelect01" name="staff_specialization">
        <option selected>Choose...</option>
        <option value="Doctor">Doctor</option>
        <option value="Nurse">Nurse</option>
        <option value="House Help">House help</option>
        <!-- <option name="specialization" value="Other">Other</option> -->
    </select>
</div>
<div class="mb-3">
    <label for="staff_salary" class="form-label">staff's salary</label>
    <input type="number" step="any" class="form-control" id="staff_salary" name="staff_salary" value="<?php echo $staff_salary ?>">
</div>
<div class="mb-3">
    <label for="staff_email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="staff_email" name="staff_email" value="<?php echo $staff_email ?>">
</div>
<div class="mb-3">
    <label for="staff_password" class="form-label">Password</label>
    <input type="password" class="form-control" id="staff_password" name="staff_password" value="<?php echo $staff_password ?>">
</div>