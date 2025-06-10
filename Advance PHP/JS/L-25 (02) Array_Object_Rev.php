<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array-Object-Table</title>
</head>
<body>
    <table border = "2" align = "center">
        <thead>
            <tr>
                <th>Roll No</th>
                <th>Name</th>
                <th>Course</th>
            </tr>
        </thead>
        <tbody id = "table">
            <tr>

            </tr>
        </tbody>
    </table>
    <script>
        let students = 
        [
            {RollNo:201, Name:"Tirth", Course:"PHP"},
            {RollNo:202, Name:"Ajay", Course:"Dot Net"},
            {RollNo:203, Name:"Pinki", Course:"Python"},
            {RollNo:204, Name:"Chinki", Course:"Java"},
        ]

        let TbodyTag = document.getElementById('table')
        html = "";
        for(index in students)
        {
            html = html + "<tr>" +
            "<td>" + students[index].RollNo + "</td>" +
            "<td>" + students[index].Name + "</td>" +
            "<td>" + students[index].Course + "</td>" +
            "</tr>" 
        }

        TbodyTag.innerHTML = html
    </script>
</body>
</html>