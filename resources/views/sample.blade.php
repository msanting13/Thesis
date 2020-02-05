<button type="button" onclick="education_fields();">Add Blank</button>
<div id="renderingContainer"></div>
<textarea id="" style="width: 500px;"></textarea>
<script>
        var room = 1;
        function education_fields() {
            room++;
            var objTo = document.getElementById('renderingContainer')
            var divtest = document.createElement("div");
            divtest.setAttribute("class", "form-group removeclass" + room);
            var rdiv = 'removeclass' + room;
            divtest.innerHTML = '<div class="input-group"><input type="text" class="form-control" id="Degree" name="Degree[]" value="" placeholder="Word"><div class="input-group-append"><button class="btn btn-danger" type="button" onclick="remove_education_fields(' + room + ');"> <i class="fa fa-minus"></i></button></div>';

            objTo.appendChild(divtest)
        }
</script>