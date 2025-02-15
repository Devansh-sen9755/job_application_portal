<?php
//session_start();
include 'admin/dbcon.php';
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>

    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: :#495057;
            display: flex;
            justify-content: center;
            align-items: justify;
            flex-direction: column;
            min-height: 100vh;
        }
        header {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        header h1 {
            font-size: 2.5rem;
            margin: 0;
        }
        header p {
            font-size: 1.2rem;
            color: #555;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            max-width: 1200px;
            padding: 20px;
        }
        .job-box {
            width: 250px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .job-box:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }
        .job-box img {
            width: 250px;
            height: 150px;
            object-fit: contain;
            background-color: #f9f9f9;
        }
        .job-content {
            padding: 15px;
        }
        .job-title {
            font-size: 1.2rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }
        .job-details {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 15px;
        }
        .apply-btn {
            display: inline-block;
            background-color: #673ab7;
            color: white;
            text-align: center;
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 0.9rem;
        }
        .apply-btn:hover {
            background-color: #5e35b1;
        }
        
    </style>
</head>
<body>
    <header>
        <br>
        
    </header>
    <div class="container">
        <!-- Job 1 - TCS -->
        <div class="job-box">
            <img src="./images/TCS.png" alt="TCS">
            <div class="job-content">
                <div class="job-title">Frontend Developer</div>
                <div class="job-details">
                    Location: Remote<br>
                    Experience: 2+ years<br>
                    Package : 7 LPA<br>
                    Skills: React, JavaScript, HTML, CSS
                </div>
                <a href="application.php" class="apply-btn">Apply Now</a>
            </div>
        </div>
        <!-- Job 2 - Wipro -->
        <div class="job-box">
            <img src="./images/wipro.png" alt="Wipro">
            <div class="job-content">
                <div class="job-title">Backend Developer</div>
                <div class="job-details">
                    Location: Bangalore, India<br>
                    Experience: 3+ years<br>
                    Package : 7 LPA<br>
                    Skills: Node.js, MongoDB, SQL
                </div>
                <a href="application.php" class="apply-btn">Apply Now</a>
            </div>
        </div>
        <!-- Job 3 - Capgemini -->
        <div class="job-box">
            <img src="./images/capgemini3.png" alt="Capgemini">
            <div class="job-content">
                <div class="job-title">Data Scientist</div>
                <div class="job-details">
                    Location: San Francisco, CA<br>
                    Experience: 4+ years<br>
                    Package : 6 LPA<br>
                    Skills: Python, Machine Learning, AI
                </div>
                <a href="application.php" class="apply-btn">Apply Now</a>
            </div>
        </div>
        <!-- Job 4 - HCL -->
        <div class="job-box">
            <img src="./images/HCL.png" alt="HCL">
            <div class="job-content">
                <div class="job-title">UI/UX Designer</div>
                <div class="job-details">
                    Location: Remote<br>
                    Experience: 1+ year<br>
                    Package : 4.5 LPA<br>
                    Skills: Figma, Prototyping, Adobe XD
                </div>
                <a href="application.php" class="apply-btn">Apply Now</a>
            </div>
        </div>
        <!-- Job 5 - RapidOps -->
        <div class="job-box">
            <img src="./images/rapidops.png" alt="RapidOps">
            <div class="job-content">
                <div class="job-title">Project Manager</div>
                <div class="job-details">
                    Location: London, UK<br>
                    Experience: 5+ years<br>
                    Package : 5 LPA<br>
                    Skills: Agile, Scrum, Communication
                </div>
                <a href="" class="apply-btn">Apply Now</a>
            </div>
        </div>
        <!-- Job 6 - HackerRank -->
        <div class="job-box">
            <img src="./images/HackerRank.png" alt="HackerRank">
            <div class="job-content">
                <div class="job-title">Mobile App Developer</div>
                <div class="job-details">
                    Location: New York, NY<br>
                    Experience: 3+ years<br>
                    Package : 8 LPA<br>
                    Skills: Kotlin, Flutter, Android Studio
                </div>
                <a href="application.php" class="apply-btn">Apply Now</a>
            </div>
        </div>
        <!-- Job 7 - IBM -->
        <div class="job-box">
            <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/IBM_logo.svg" alt="IBM">
            <div class="job-content">
                <div class="job-title">Cloud Engineer</div>
                <div class="job-details">
                    Location: Remote<br>
                    Experience: 4+ years<br>
                    Package : 5 LPA<br>
                    Skills: AWS, Azure, Docker
                </div>
                <a href="application.php" class="apply-btn">Apply Now</a>
            </div>
        </div>
        <!-- Job 8 - Deltax -->
        <div class="job-box">
            <img src="./images/deltax.png" alt="Deltax">
            <div class="job-content">
                <div class="job-title">Digital Marketing Specialist</div>
                <div class="job-details">
                    Location: Remote<br>
                    Experience: 2+ years<br>
                    Package : 6.5 LPA<br>
                    Skills: SEO, Google Ads, Analytics
                </div>
                <a href="application.php" class="apply-btn">Apply Now</a>
            </div>
        </div>
    </div>
</body>
</html>
