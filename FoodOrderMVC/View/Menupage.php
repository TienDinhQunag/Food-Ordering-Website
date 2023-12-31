<?php
include "Bone.php"

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bone.css">
    
    <style>
 

        .flex-container {

            margin: auto;
        }
        .signup-section{
            max-width: 1400px;
            margin: auto;
        }

        .flex-container  {
        display: flex;
        flex-wrap: wrap;
        max-width: 1400px;
        }

        .filter {
            flex: 30%;
            background-color: lightcoral;
            padding: 40px;
            box-sizing: border-box; /* Include padding in the width calculation */
        }

        .display-category {
            flex: 70%;
            padding: 40px;
            background-color: ;
            box-sizing: border-box; /* Include padding in the width calculation */
        }
        /* ... your existing styles ... */

    @media (max-width: 768px) {
        .flex-container {
            flex-direction: column; /* Stack items vertically on smaller screens */
        }

        .filter, .display-category {
            flex: 100%; /* Take up full width on smaller screens */
        }
    }

        .signup-section {
            background-color: #87CEEB;
            color: white;
            text-align: center;
            padding: 50px 0;
          
        }

        .footer-section {
            background-color: #696969;
            color: white;
            text-align: center;
            padding: 50px 0;
        }

        .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .pagination a {
        color: black;
        padding: 8px 16px;
        text-decoration: none;
        justify-content: center;
        border: 2px solid #ffc0cb;
        margin: 0 4px;
        border-radius: 4px;
        width: 45px; 
        align-items: center;
    }

    .pagination a:hover {
        background-color: #faf2f9;
        color: black;
    }

    .pagination .active {
        background-color: #007bff;
        color: black;
    }

        /* Default styles for larger screens */
        .card {
            width: 300px;
            height: 350px;
            background-color: #f4d3e2;
           
        }

        .card img {
        width: 100%;
        height: 75%;
        object-fit: cover; /* Maintain aspect ratio and cover the container */
    }
        .card-title {
        font-size: 20px ; /* Adjust the font size to your preference */
        margin-top: -8px;
    }
    .card-text{
        font-size: 20px ;
        margin-top: -10px;
    }
       /* Adjust styles for medium screens */
        @media (max-width: 767px) {
            .card {
                width: 110px;
                height: 190px;
                
            }
            .card-title {
        font-size: 10px; /* Adjust the font size to your preference */
        margin-top: -8px;
    }
    .card-text{
        font-size: 11px ;
        margin-top: -12px;
       
    }
        }

    </style>
    <title>MenuPage</title>
</head>

<body>
<!-- Signup Section -->
    <div class="signup-section">
        <div class="container">
            <h2>Sign Up</h2>
            <!-- Add your sign-up content here -->
        </div>
    </div>

<!-- Container Main Section -->
<div class="flex-container">
    <div class="filter">
        <!-- Add your filter content here -->
        Filter Section
    </div>
    <div class="display-category">
            <?php
            include('../Controller/pagination.php');



            ?>
    </div>
</div>

<script>


function loadFoodItems(page, keyword) {
    $.ajax({
        url: '../Controller/pagination.php',
        type: 'GET',
        data: { page: page, keyword: keyword },
        success: function (data) {
            $('.display-category').html(data);
        },
        error: function (error) {
            console.error('Error loading food items:', error);
        }
    });
}



$(document).on('click', '.pagination a', function (e) {
    e.preventDefault();
    var page = $(this).attr('href').split('=')[1];
    var keyword = $('#searchInput').val(); // Get the search keyword
    loadFoodItems(page, keyword);
});

// Call loadFoodItems on input change
$('#searchInput').on('input', function () {
    var keyword = $(this).val();
    loadFoodItems(1, keyword);
});

</script>


<script>
    // ... (Các hàm khác ở đây)

    // Function để lấy từ khóa từ URL
    function getKeywordFromURL() {
        var urlParams = new URLSearchParams(window.location.search);
        return urlParams.get('keyword') || '';
    }

    // Function để thiết lập giá trị từ khóa trong ô tìm kiếm
    function setKeywordInSearchBox() {
        var searchInput = document.getElementById('searchInput');
        searchInput.value = getKeywordFromURL();
    }

    // Thiết lập giá trị từ khóa khi trang được tải
    setKeywordInSearchBox();
    localStorage.removeItem('searchKeyword');
    
    // ... (Các xử lý sự kiện tìm kiếm khác ở đây)
</script>
<script>
        // Check if the page is being refreshed
        if (performance.navigation.type === 1) {
            // Set the keyword parameter to null
            var urlParams = new URLSearchParams(window.location.search);
            urlParams.set('keyword', "");

            // Redirect to the updated URL
            var newUrl = window.location.pathname + '?' + urlParams.toString();
            window.location.href = newUrl;
        }
</script>







    <div class="footer-section">
        <div class="container">
            <h2>Footer</h2>
            
        </div>
    </div>

</body>

</html>

