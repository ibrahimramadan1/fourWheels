var deliverables = 0;
var Admins = 2;
function newadmin() {
    $('.AdminsDetails').append(
        `<div class="AdminDetails" id="${deliverables}">
        <h3><button onclick="remove(${deliverables++})" class="btn s btn-danger">-</button> Admin</h3>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Admin Name</span>
            </div>
            <input name="Aname[]" type="text" class="form-control" placeholder="Admin Name">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">User Name</span>
            </div>
            <input name="Auser[]" type="text" class="form-control" placeholder="User Name">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Email</span>
            </div>
            <input name="Aemail[]" type="Email" class="form-control" placeholder="Email">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Password</span>
            </div>
            <input name="Apassword[]" type="password" class="form-control" placeholder="Password">
        </div>
    </div>`
    );
}
function remove(id) {
    $('#'+id).remove();
}
