<script>
    var path = "<?php 
    $str = home_url(); 
    $str.= '/wp-content/plugins/just-another-form';
    echo $str;
    ?>";
    getPath = path + "/getData.php";
    postPath = path + "/insertdb.php";
</script>
<?php

$allCDN = <<<'ACDN'
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
ACDN;

$ngForm = <<<'NGF'
    <script  src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js">  </script>
    <div ng-app="form" ng-controller="formCtrl">
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
        <br>
        <div class="col-md-8">
            <table style="text-align: center;" class="table-bordered col-md-12">
                <thead><tr>
                    <th style="text-align: center; padding: 5px;">First Name</th>
                    <th style="text-align: center; padding: 5px;">Last Name</th>
                    <th style="text-align: center; padding: 5px;">E-mail</th>
                </tr></thead>
                <tr ng-repeat="x in names">
                    <td>{{ x.fname }}</td>
                    <td>{{ x.lname }}</td>
                    <td>{{ x.email }}</td>
                </tr>
                <tr>
                    <td>{{ fname }}</td>
                    <td>{{ lname }}</td>
                    <td>{{ email }}</td>
                </tr>
            </table>
        </div>

    </div>
NGF;

$ngScript = <<<'NGS'
    <script>
    var app = angular.module('form',[]);

    app.controller('formCtrl', function($scope, $http) {
        $scope.insertData=function(){
            $http.get(getPath).then(function(response){
                $scope.names = response.data.records;});
            $http.post(postPath, {
                'fname':$scope.fname,
                'lname':$scope.lname,
                'email':$scope.email
            }).then(function(response){
                    console.log("Data Entered into database");
                },function(error){
                    alert($scope.fname+$scope.lname+$scope.email+" Some error occured while inserting data to database");
                    console.error(error);
                    console.log("Data Entered into database");
                });
        },
        $http.get(getPath)
        .then(function (response) {$scope.names = response.data.records;});
    });
    
    </script>
NGS;

// $ngScript = <<< 'NGS'
//     <script>
//     var app = angular.module('form', []);
//     app.controller('formCtrl', function ($scope, $http) {
//         $scope.login = function () {
//             $http({
//                 method: "post",
//                 url: path + "insertdb.php",
//                 data: {
//                     fname: $scope.fname,
//                     lname: $scope.lname,
//                     email: $scope.email
//                 },
//                 headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
//             }).request.success(function (data) {
//                 if(data == "1"){
//                     $scope.responseMessage = "Successfully Logged In";
//                     alert("yes");
//                 }
//                 else{   
//                     $scope.responseMessage = "Username or Password is incorrect";
//                     alert("no");
//                 }
//             });
//             $http.get(path + "/getData.php").success(function(data){
// 				$scope.data = data;
// 			}).error(function() {
// 				$scope.data = "error in fetching data";
// 			});
//         }
//     });
//     </script>
// NGS;

echo "<br>".$ngForm."<br>".$ngScript;

?>