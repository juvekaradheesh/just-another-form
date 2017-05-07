<?php
echo <<< 'EOD'
    <div class="col-md-8">
        <form >
            <div class="form-group col-md-6">
                <label for="fname">First Name</label>
                <input class="form-control" type="text" ng-model="fname" name="fname">
            </div>
            <div class="form-group col-md-6">
                <label for="lname">Last Name</label>
                <input class="form-control" type="text" ng-model="lname" name="lname">
            </div>
            <div class="form-group col-md-12">
                <label for="email">E-mail</label>
                <input class="form-control" type="email" ng-model="email" name="email">
            </div>
            <br>
            <br>
            <div class="form-group col-md-3" >
            <input class="btn btn-success form-control" type="submit" value="Submit" ng-click="insertData()">
            </div>
        </form>
    </div>
EOD;

?>