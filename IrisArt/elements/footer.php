<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celestial Art by Iris Miguel Orais</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #F4F1E1; /* Ivory Background */
        }

        footer {
            background-color: #C4A484; /* Paper Brown */
            color: #D4D2C1; /* Light Cream Text Color */
            padding: 40px 0;
            font-family: 'Arial', sans-serif;
        }

        .footer-container {
            width: 85%;
            margin: 0 auto;
        }

        .footer-row {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 30px;
        }

        .footer-column {
            flex: 1;
            min-width: 250px;
            margin: 10px;
        }

        .footer-column h3 {
            font-size: 22px;
            margin-bottom: 15px;
            font-weight: bold;
            color:rgb(0, 0, 0); /* Sky Blue */
        }

        .footer-column p, .footer-column ul {
            font-size: 14px;
            line-height: 1.7;
            color:rgb(0, 0, 0); /* Light Cream text for general readability */
        }

        .footer-column a {
            color:rgb(0, 0, 0); /* Light Cream Color */
            text-decoration: none;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        .footer-column a:hover {
            color: #A0D6D1; /* Seafoam Green on hover */
            transform: translateX(5px);
        }

        .footer-column ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-column ul li {
            margin: 8px 0;
        }

        .footer-column ul li a {
            color:rgb(0, 0, 0); /* Light Cream Color */
            text-decoration: none;
            font-size: 14px;
        }

        .footer-column ul li a:hover {
            color: #A0D6D1; /* Seafoam Green on hover */
        }

        .footer-column p {
            font-size: 14px;
            color:rgb(0, 0, 0); /* Soft gray for subtext */
        }

        .footer-column {
            border-right: 1px solid rgba(255, 255, 255, 0.2);
            padding-right: 15px;
        }

        .footer-column:last-child {
            border-right: none;
        }

        @media screen and (max-width: 768px) {
            .footer-row {
                flex-direction: column;
                align-items: center;
            }

            .footer-column {
                margin-bottom: 20px;
                border-right: none;
            }

            .footer-column h3 {
                font-size: 20px;
            }

            .footer-column p, .footer-column ul {
                font-size: 13px;
            }
        }
    </style>
</head>
<body>
    <footer>
        <div class="footer-container">
            <div class="footer-row">
                <div class="footer-column">
                    <h3>Celestial Art by Iris Miguel Orais</h3>
                    <p>Welcome to Celestial Art, where creativity knows no bounds. We provide high-quality art supplies to help you bring your artistic vision to life. From vibrant paints to fine brushes, we have everything you need to create stunning works of art.</p>
                    <p><strong>Iris Miguel Orais</strong>, Founder & Artist</p>
                </div>

                <div class="footer-column">
                    <h3>Our Products</h3>
                    <ul>
                        <li><a href="#">Acrylic Paints</a></li>
                        <li><a href="#">Watercolor Supplies</a></li>
                        <li><a href="#">Brushes & Tools</a></li>
                        <li><a href="#">Canvas & Paper</a></li>
                        <li><a href="#">Drawing Materials</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h3>Customer Service</h3>
                    <ul>
                        <li><a href="#">Your Account</a></li>
                        <li><a href="#">Order Status</a></li>
                        <li><a href="#">Delivery Information</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h3>Contact</h3>
                    <p>123 Artistry Lane, Creative City, USA</p>
                    <p>Email: contact@celestialart.com</p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
