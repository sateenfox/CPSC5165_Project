<?php
//if($_GET['q'] == 'Search...'){
//    header('Location: search.php');
//}
$search = $_GET['q'];
if($_GET['q'] !== ''){
    $mysqli = new mysqli('localhost', 'ilovericelol', '', 'inventory');
?>
<html>
    <head>
        <script type="text/javascript">
            function active(){
                var sb = document.getElementById('searchBox');
                if(sb.value == 'Search...'){
                    sb.value = ''
                    sb.placeholder = 'Search...'
                }
            }
            function inactive(){
                var sb = document.getElementById('searchBox');
                if(sb.value == ''){
                    sb.placeholder = ''
                    sb.value = 'Search...'
                }
            }
        </script>
        <style type="text/css">
            #searchBox{
                border: 1px solid #000000;
                border-right: none;
                -webkit-border-top-left-radius: 10px;
                -webkit-border-bottom-left-radius: 10px;
                -moz-border-radius-topleft: 10px;
                -moz-border-radius-bottomleft: 10px;
                border-top-left-radius: 10px;
                border-bottom-left-radius: 10px;
                font-size: 16px;
                padding: 10px;
                outline: none;
                width: 250px;
            }
            #searchButton{
                border: 1px solid #000000;
                -webkit-border-top-right-radius: 10px;
                -webkit-border-bottom-right-radius: 10px;
                -moz-border-radius-topright: 10px;
                -moz-border-radius-bottomright: 10px;
                border-top-right-radius: 10px;
                border-bottom-right-radius: 10px;
                font-size: 16px;
                padding: 10px;
                background: #c0c0c0;
                font-weight: bold;
                cursor: pointer;
                outline: none;
            }
            #searchButton:hover{
                background: #f6e049;
            }
            body{
                font-family: arial;
                
            }
            h3{
                margin: 20px 0px 0px 0px;
                padding: 0;
                
            }
            p{
                margin: 0;
                padding: 0;
            }
        </style>
    </head>
    <body>
        <form action="search.php" method="GET" id="searchForm" />
        
            <input type="text" name ="q" id="searchBox" placeholder="" value="Search..." maxlength="25" autocomplete= "off"
            onMouseDown="active();" onBlue="inactive();" />
            <input type="submit" id="searchButton" value="Search"/>
            </form>
            <?php
            //Testing if database connection connected
            $query = mysqli_query($mysqli, "SELECT * FROM products WHERE title LIKE '%$search%' OR description LIKE '%$search%'");
            $num_rows = mysqli_num_rows($query);
            
            while($row = mysqli_fetch_array($query)){
                $id = $row['id'];
                $title = $row['title'];
                $desc = $row['description'];
                
                echo '<h3>' . $title . '</h3><p> ' . $desc . '</p><br />';
            }
        
            ?>
    </body>
</html>
<?php
}
//else{
//    header('Location: search.php');
//}
?>