<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">

        <title>Issue Tracker</title>
    </head>
    <script type="text/javascript">

        $(document).ready(function(){

            //Toggle End Date - on checkbox change
            //DOESNT WORK CORRECTLY- validationj done in post
            /*
            $("#EndCheckbox").change(function(){
                var EndDate = document.getElementById("EndDateContainer");

                if(this.checked){
                    //EndDate.visibility = "hidden";
                    EndDate.style.display = "hidden";
                } else {
                    //EndDate.visibility = "visible";
                    EndDate.style.display = "none";
                }
            });
            */

            //Submit
            $("#submit").click(function(){
                var errorCheck = false;

                //Get values
                var label = document.getElementById("issue-label-id").value;
                var description = document.getElementById("description-id").value;
                var startDate = document.getElementById("start-date-id").value;
                var endChecked = document.getElementById("EndCheckbox").checked;
                var endDate = document.getElementById("EndDate").value;

                //Validation
                if(label == "" || startDate == ""){
                    errorCheck = true;
                    alert("Please fill out required fields.");
                }
                
                if(!endChecked && endDate == ""){
                    errorCheck = true;
                    alert("Please fill out end date.");
                } else {
                    endDate = startDate;
                }
                

                //Send to DB
                if(!errorCheck){
                    $.post({
                        url: "AddIssueDB.php",
                        data: {
                            title: label,
                            description: description,
                            start: startDate,
                            end: endDate
                        },
                        success: function(){
                            location.reload();
                            alert("Issue added.");
                        },
                        error: function(err){
                            alert("Err" + err);
                        }
                    });
                }

            });

        });

    </script>
    <body>
        <?php require_once 'header.html' ?>

        <div class="wrapper-body container">
            <h1 class="display-2">Current Issues</h1>
            <p class="lead">Current issues entered in Issue Tracker</p>
            <p>* indicates a required field.</p>

            <hr>
            <br>

            <form>
                <div class="form-group">
                    <label>Issue Label*:</label>
                    <input type="text" class="form-control" id="issue-label-id"></input>
                </div>
                <div class="form-group">
                    <label>Start Date*:</label>
                    <input type="date" class="form-control" id="start-date-id"></input>
                    
                </div>
                <div class="form-group">
                    <label>End Date*:</label>
                    <div class="form-control">
                        <input type="checkbox" id="EndCheckbox" > Same as start date</input>
                    </div>
                   
                    <div class="form-control" id="EndDateContainer">
                        
                        <input type="date" class="form-control" id="EndDate"></input>
                    </div>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" rows="3" id="description-id"></textarea>
                </div>
            </form>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" id="submit">Add Issue</button>
            </div>
        </div>
    </body>
</html>