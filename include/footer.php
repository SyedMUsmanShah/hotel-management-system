<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.bundle.min.js" integrity="sha512-igl8WEUuas9k5dtnhKqyyld6TzzRjvMqLC79jkgT3z02FvJyHAuUtyemm/P/jYSne1xwFI06ezQxEwweaiV7VA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.20/angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.20/angular-messages.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.13/daterangepicker.min.js"></script>
<!-- endbower -->

<script src="https://fragaria.github.io/angular-daterangepicker/js/angular-daterangepicker.min.js"></script>

<script>
    exampleApp = angular.module('example', ['ngMessages', 'daterangepicker']);
    exampleApp.controller('TestCtrl', function($scope) {
        $scope.date = {
            startDate: moment().subtract(1, "days"),
            endDate: moment()
        };

        $scope.SimplePickerChange = function() {
            alert('hi');
            $scope.date = {
                endDate: $scope.date.startDate.add(30, "days")
            }
            alert(JSON.stringify($scope.date));
        };
    });

    angular.bootstrap(document, ['example']);
</script>
<script>
    $(document).ready(function() {

        $(".update-dropdown").click(function() {
            $(".dropdownmenu").show();

        })
        $(".done").click(function() {
            $(".dropdownmenu").slideUp();

        })



        $adultValue = 0;

        $(".Adult-plus-btn").click(function() {
            $adultValue++;
            $(".Adult-count").val($adultValue);
            $(".show-count-adults").text($adultValue);

        })

        $(".Adult-minus-btn").click(function() {
            $adultValue--;
            $(".Adult-count").val($adultValue);
            $(".show-count-adults").text($adultValue);

        })

        $ChildValue = 0;


        $(".Child-plus-btn").click(function() {
            $ChildValue++;
            $(".Child-count").val($ChildValue);
            $(".show-count-Childrens").text($ChildValue);
            if ($(".Child-count").val() >= 1) {
                $(".Child-counter-row").show();
            } else {
                $(".Child-counter-row").hide();
            }
        })

        $(".Child-minus-btn").click(function() {
            $ChildValue--;
            $(".Child-count").val($ChildValue);
            $(".show-count-Childrens").text($ChildValue);
            if ($(".Child-count").val() >= 1) {
                $(".Child-counter-row").show();
            } else {
                $(".Child-counter-row").hide();
            }
        })



        $roomValue = 0;
        $(".Room-plus-btn").click(function() {
            $roomValue++;
            $(".Room-count").val($roomValue);
            $(".show-count-rooms").text($roomValue);

        })

        $(".Room-minus-btn").click(function() {
            $roomValue--;
            $(".Room-count").val($roomValue);
            $(".show-count-rooms").text($roomValue);

        })
        

    });
</script>

<?php require_once 'Typehead.php' ?>