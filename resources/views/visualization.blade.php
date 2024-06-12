
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

    <title>Visualization</title>
    <style>
    /* Style for the headings */
    .heading {
        margin-top: 20px;
        text-align: start;
        cursor: pointer;
        padding: 10px;
        background-color: #e0e0e0;
        border: 1px solid #ccc;
        width: 190px;
    }

    /* Style for the scrollable container */
    .scrollable-container {
        overflow-y: auto;
        max-height: calc(100vh - 40px);
        /* Adjust the height as needed */
        margin-left: 20px;
    }

    /* Style for the image containers */
    .image-container {
        text-align: start;
        margin-top: 20px;
        display: flex;
        flex-wrap: wrap;
        max-width: 330px;
        display: none;
        /* Initially hidden */
    }

    /* Style for individual images */
    .image-box {
        margin: 0 10px 10px 0;
        width: calc(33.33% - 10px);
    }

    /* Style for the images */
    .image-box img {
        width: 100px;
        height: 100px;
        display: block;
        cursor: pointer;
    }

    /* Style for the mockup container */
    .container {
        position: absolute;
        top: 20px;
        right: 50px;
        width: 500px;
        height: 500px;
        background-size: cover;
        background-position: center;
    }

    /* Style for the mockup image */
    .container img.mockup {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .button-container {
        margin-bottom: 20px;
    }

    .button {
        margin-top: 20px;
        background-color: #3d5ee1;
        border: 1px solid #3d5ee1;
        border: none;
        color: white;
        padding: 10px 22px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        cursor: pointer;
    }

    #saveButton {
        background-color: #3d5ee1;
        border: 1px solid #3d5ee1;
        position: fixed;
        /* This will fix the position relative to the viewport */
        top: 518px;
        /* Adjust the top position */
        left: 950px;
        /* Adjust the left position */
        z-index: 1000;
        /* Ensures it stays on top of other elements */
    }
    </style>
</head>

<body>
    <!-- Scrollable container -->
    <div class="scrollable-container">
        <!-- Heading for mockups -->
        <div class="button-container" style="display: flex; align-items: center;">
            <div class="heading" id="mockupHeading" style="margin-right: 20px;">Ban with Cuffs</div>
            <button class="button" id="mockupButton">Select from Device</button>
        </div>

        <!-- Image container for mockups -->
        <div class="image-container" id="mockupImageContainer">
            <!-- Image boxes for mockups -->
        </div>
        <!-- Heading for mockup2 -->
        <div class="button-container" style="display: flex; align-items: center;">
            <div class="heading" id="mockupHeading2" style="margin-right: 20px;">Ban with no Cuffs</div>
            <button class="button" id="mockupButton2">Select from Device</button>
        </div>
        <!-- Image container for mockup2 -->
        <div class="image-container" id="mockupImageContainer2">
            <!-- Image boxes for mockup2 -->
        </div>

        <!-- Heading for mockup3 -->
        <div class="button-container" style="display: flex; align-items: center;">
            <div class="heading" id="mockupHeading3" style="margin-right: 20px;">Collor with Cuffs</div>
            <button class="button" id="mockupButton3">Select from Device</button>
        </div>
        <!-- Image container for mockup3 -->
        <div class="image-container" id="mockupImageContainer3">
            <!-- Image boxes for mockup3 -->
        </div>

        <!-- Heading for mockup4 -->
        <div class="button-container" style="display: flex; align-items: center;">
            <div class="heading" id="mockupHeading4" style="margin-right: 20px;">Collor with no Cuffs</div>
            <button class="button" id="mockupButton4">Select from Device</button>
        </div>
        <!-- Image container for mockup4 -->
        <div class="image-container" id="mockupImageContainer4">
            <!-- Image boxes for mockup4 -->
        </div>

        <!-- Heading for fabrics -->
        <div class="button-container" style="display: flex; align-items: center;">
            <div class="heading" id="fabricHeading" style="margin-right: 20px;">Fabric</div>
            <button class="button" id="fabricButton">Select from Device</button>
        </div>

        <!-- Image container for fabrics -->
        <div class="image-container" id="fabricImageContainer">
            <!-- Image boxes for fabrics -->
        </div>
    </div>
    <!-- Mockup container -->
    <div class="container" id="mockupContainer">
        <img class="mockup" src="assets/img/visualization/Ban 1.png" alt="mockup">
    </div>
    <!-- Save button -->
    <button class="button" id="saveButton">Save Image</button>

    <!-- Input for selecting images from the computer -->
    <input type="file" id="mockupImageInput" style="display: none;" accept="image/*">
    <input type="file" id="mockupImageInput2" style="display: none;" accept="image/*">
    <input type="file" id="mockupImageInput3" style="display: none;" accept="image/*">
    <input type="file" id="mockupImageInput4" style="display: none;" accept="image/*">
    <input type="file" id="fabricImageInput" style="display: none;" accept="image/*">


    <div id="alertModal" class="centered-modal">
        <div class="checkmark-circle">
            <i class="fas fa-check-circle"></i> <!-- Font Awesome Checkmark -->
        </div>
        <h5>Awesome!</h5>
        <p class="text-center" id="text">Image added Successfully!</p>
        <div class="d-flex justify-content-center">
            <button class="buttons" id="okButton">OK</button>
        </div>
    </div>

    <style>
    h5 {
        text-align: center !important;
        font-size: 1rem;
        font-family: 'Roboto', sans-serif;
        margin-top: 0;
        color: #000000;
        margin-bottom: .5rem;
        font-weight: bold;
        line-height: 1.2;
    }

    #text {
        font-family: 'Roboto', sans-serif;
    }

    .buttons {
        padding: 10px 20px;
        background-color: #28A745;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        margin-left: 55px;
        border: 1px solid #28A745;
    }

    .buttons:hover {
        background-color: #28A745;
    }

    .centered-modal {
        position: fixed;
        top: 50%;
        left: 45%;
        transform: translate(-50%, -50%);
        width: auto;
        padding: 20px;
        z-index: 1050;
        background: #fff;
        /* Background color */
        border: 1px solid #ccc;
        /* Border */
        border-radius: .25rem;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, .15);
        display: none;
        /* Initially hidden */


    }



    .checkmark-circle {
        color: #28A745;
        /* Bootstrap success color */
        font-size: 2rem;
        /* Size of the checkmark */
        display: flex;
        justify-content: center;
        margin-bottom: 0.5rem;
    }
    </style>


    <script>
    // Function to handle when the user clicks on a heading
    function handleHeadingClick(headingId, containerId) {
        const headings = document.querySelectorAll('.heading');
        const containers = document.querySelectorAll('.image-container');

        headings.forEach(heading => {
            if (heading.id === headingId) {
                heading.style.backgroundColor = '#d0d0d0'; // Change color to indicate active heading
            } else {
                heading.style.backgroundColor = '#e0e0e0';
            }
        });

        containers.forEach(container => {
            if (container.id === containerId) {
                container.style.display = 'flex'; // Show the clicked heading's container
            } else {
                container.style.display = 'none'; // Hide other containers
            }
        });
    }

    // Add event listeners to the headings
    document.getElementById('mockupHeading').addEventListener('click', function() {
        handleHeadingClick('mockupHeading', 'mockupImageContainer');
    });

    document.getElementById('mockupHeading2').addEventListener('click', function() {
        handleHeadingClick('mockupHeading2', 'mockupImageContainer2');
    });

    document.getElementById('mockupHeading3').addEventListener('click', function() {
        handleHeadingClick('mockupHeading3', 'mockupImageContainer3');
    });

    document.getElementById('mockupHeading4').addEventListener('click', function() {
        handleHeadingClick('mockupHeading4', 'mockupImageContainer4');
    });

    document.getElementById('fabricHeading').addEventListener('click', function() {
        handleHeadingClick('fabricHeading', 'fabricImageContainer');
    });

    // Function to handle when a mockup image is selected from the file input
    document.getElementById('mockupButton').addEventListener('click', function() {
        document.getElementById('mockupImageInput').click(); // Clicking the hidden file input
    });

    document.getElementById('mockupButton2').addEventListener('click', function() {
        document.getElementById('mockupImageInput2').click(); // Clicking the hidden file input
    });

    document.getElementById('mockupButton3').addEventListener('click', function() {
        document.getElementById('mockupImageInput3').click(); // Clicking the hidden file input
    });

    document.getElementById('mockupButton4').addEventListener('click', function() {
        document.getElementById('mockupImageInput4').click(); // Clicking the hidden file input
    });

    // Function to handle when a fabric image is selected from the file input
    document.getElementById('fabricButton').addEventListener('click', function() {
        document.getElementById('fabricImageInput').click(); // Clicking the hidden file input
    });

    // Function to set image of the mockup container when a mockup is selected
    function setImageInMockup(imageUrl) {
        document.querySelector('#mockupContainer img.mockup').src = imageUrl;
    }


    // Function to set the fabric as the background of the mockup container
    function setFabricAsBackground(imageUrl) {
        document.getElementById('mockupContainer').style.backgroundImage = 'url(' + imageUrl + ')';
    }

    // Function to handle when a mockup image is selected from the file input
    document.getElementById('mockupImageInput').addEventListener('change', function(event) {
        const fileList = event.target.files; // Get the selected files
        if (fileList.length > 0) {
            const file = fileList[0]; // Get the first file
            const imageUrl = URL.createObjectURL(file); // Create URL for the selected image
            // Set the selected image as the image of the mockup container
            setImageInMockup(imageUrl);
            // Create and append a new image box for the selected image
            createImageBox(imageUrl, true, 'mockup');
        }
    });

    // Function to handle when a mockup2 image is selected from the file input
    document.getElementById('mockupImageInput2').addEventListener('change', function(event) {
        const fileList = event.target.files; // Get the selected files
        if (fileList.length > 0) {
            const file = fileList[0]; // Get the first file
            const imageUrl = URL.createObjectURL(file); // Create URL for the selected image
            // Set the selected image as the image of the mockup2 container
            setImageInMockup(imageUrl, 2);
            // Create and append a new image box for the selected image
            createImageBox(imageUrl, true, 'mockup2');
        }
    });


    // Function to handle when a mockup3 image is selected from the file input
    document.getElementById('mockupImageInput3').addEventListener('change', function(event) {
        const fileList = event.target.files; // Get the selected files
        if (fileList.length > 0) {
            const file = fileList[0]; // Get the first file
            const imageUrl = URL.createObjectURL(file); // Create URL for the selected image
            // Set the selected image as the image of the mockup3 container
            setImageInMockup(imageUrl, 3);
            // Create and append a new image box for the selected image
            createImageBox(imageUrl, true, 'mockup3');
        }
    });

    // Function to handle when a mockup4 image is selected from the file input
    document.getElementById('mockupImageInput4').addEventListener('change', function(event) {
        const fileList = event.target.files; // Get the selected files
        if (fileList.length > 0) {
            const file = fileList[0]; // Get the first file
            const imageUrl = URL.createObjectURL(file); // Create URL for the selected image
            // Set the selected image as the image of the mockup4 container
            setImageInMockup(imageUrl, 4);
            // Create and append a new image box for the selected image
            createImageBox(imageUrl, true, 'mockup4');
        }
    });

    // Function to handle when a fabric image is selected from the file input
    document.getElementById('fabricImageInput').addEventListener('change', function(event) {
        const fileList = event.target.files; // Get the selected files
        if (fileList.length > 0) {
            const file = fileList[0]; // Get the first file
            const imageUrl = URL.createObjectURL(file); // Create URL for the selected image
            // Set the selected image as the background of the mockup container
            setFabricAsBackground(imageUrl);
            // Create and append a new image box for the selected image
            createImageBox(imageUrl, true, 'fabric');
        }
    });

    // Function to create and append a new image box
    function createImageBox(imageUrl, fromDevice = false, type = 'mockup') {
        const newImageBox = document.createElement('div');
        newImageBox.classList.add('image-box');
        const newImage = document.createElement('img');
        newImage.src = imageUrl;
        newImage.addEventListener('click', function() {
            if (type === 'mockup') {
                setImageInMockup(imageUrl, 1);
            } else if (type === 'mockup2') {
                setImageInMockup(imageUrl, 2);
            } else if (type === 'mockup3') {
                setImageInMockup(imageUrl, 3);
            } else if (type === 'mockup4') {
                setImageInMockup(imageUrl, 4);
            } else {
                setFabricAsBackground(imageUrl);
            }
        });
        newImageBox.appendChild(newImage);
        // Append to the appropriate image container based on the type
        if (type === 'mockup') {
            if (fromDevice) {
                document.getElementById('mockupImageContainer').appendChild(newImageBox);
            } else {
                document.getElementById('mockupImageContainer').prepend(newImageBox);
            }
        } else if (type === 'mockup2') {
            if (fromDevice) {
                document.getElementById('mockupImageContainer2').appendChild(new ImageBox);
            } else {
                document.getElementById('mockupImageContainer2').prepend(newImageBox);
            }
        } else if (type === 'mockup3') {
            if (fromDevice) {
                document.getElementById('mockupImageContainer3').appendChild(newImageBox);
            } else {
                document.getElementById('mockupImageContainer3').prepend(newImageBox);
            }
        } else if (type === 'mockup4') {
            if (fromDevice) {
                document.getElementById('mockupImageContainer4').appendChild(newImageBox);
            } else {
                document.getElementById('mockupImageContainer4').prepend(newImageBox);
            }
        } else {
            if (fromDevice) {
                document.getElementById('fabricImageContainer').appendChild(newImageBox);
            } else {
                document.getElementById('fabricImageContainer').prepend(newImageBox);
            }
        }
    }

    // Sample images to display initially for mockups and fabrics
    const mockupImages = ['assets/img/visualization/Ban with cuffs/ban 9.png',
        'assets/img/visualization/Ban with cuffs/ban 10.png',
    ];

    const mockupImages2 = ['assets/img/visualization/Ban with no cuffs/ban 2.png',
        'assets/img/visualization/Ban with no cuffs/ban 3.png',
        'assets/img/visualization/Ban with no cuffs/ban 4.png',
        'assets/img/visualization/Ban with no cuffs/ban 5.png',
        'assets/img/visualization/Ban with no cuffs/ban 6.png',
        'assets/img/visualization/Ban with no cuffs/ban 7.png',
        'assets/img/visualization/Ban with no cuffs/ban 8.png'
    ];

    const mockupImages3 = ['assets/img/visualization/Collor with cuffs/C10.png',
        'assets/img/visualization/Collor with cuffs/C11.png'
    ];

    const mockupImages4 = ['assets/img/visualization/Collor with no cuffs/C1.png',
        'assets/img/visualization/Collor with no cuffs/C2.png',
        'assets/img/visualization/Collor with no cuffs/C3.png',
        'assets/img/visualization/Collor with no cuffs/C4.png',
        'assets/img/visualization/Collor with no cuffs/C5.png',
        'assets/img/visualization/Collor with no cuffs/C6.png',
        'assets/img/visualization/Collor with no cuffs/C7.png',
        'assets/img/visualization/Collor with no cuffs/C8.png',
        'assets/img/visualization/Collor with no cuffs/C9.png'

    ];
    const fabricImages = ['assets/img/visualization/1.jpg', 'assets/img/visualization/2.jpg',
        'assets/img/visualization/3.jpg', 'assets/img/visualization/4.jpg', 'assets/img/visualization/5.jpg',
        'assets/img/visualization/6.jpg'
    ];

    // Display sample mockup images initially
    mockupImages.forEach(function(imageUrl) {
        createImageBox(imageUrl, false, 'mockup');
    });

    // Display sample mockup2 images initially
    mockupImages2.forEach(function(imageUrl) {
        createImageBox(imageUrl, false, 'mockup2');
    });

    // Display sample mockup3 images initially
    mockupImages3.forEach(function(imageUrl) {
        createImageBox(imageUrl, false, 'mockup3');
    });

    // Display sample mockup4 images initially
    mockupImages4.forEach(function(imageUrl) {
        createImageBox(imageUrl, false, 'mockup4');
    });

    // Display sample fabric images initially
    fabricImages.forEach(function(imageUrl) {
        createImageBox(imageUrl, false, 'fabric');
    });


    document.getElementById('saveButton').addEventListener('click', function() {
        html2canvas(document.getElementById('mockupContainer')).then(function(canvas) {
            canvas.toBlob(function(blob) {
                var formData = new FormData();
                formData.append('image', blob, 'canvas.png');

                fetch('/images/store', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Show the modal
                            document.getElementById('alertModal').style.display = 'block';
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });
        });
    });

    document.querySelector('#okButton').addEventListener('click', function() {
        // Redirect to add-order page
        window.location.href = "{{ route('add-order') }}";
    });
    </script>

</body>

</html>