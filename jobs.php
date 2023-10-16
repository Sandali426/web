<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal - View Jobs</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">
    <h1>Job Portal - View Jobs</h1>

    <!-- Display Jobs -->
    <div id="jobsList">
        <!-- Jobs will be displayed here dynamically using JavaScript -->
    </div>

    <form action="submit_job.php" method="post">
        <label for="jobTitle">Job Title:</label><br/>
        <input type="text" name="jobTitle" required><br/>

        <label for="jobDescription">Job Description:</label><br/>
        <textarea name="jobDescription" rows="4" required></textarea><br/>

        <label for="industry">Industry:</label><br/>
        <select name="industry" id="industry">
            <option value="IT">Information Technology</option>
            <option value="Marketing">Marketing and Advertising</option>
            <option value="Finance">Finance and Accounting</option>
            <option value="Customer">Customer Service</option>
            <option value="Health">Healthcare</option>
            <option value="Education">Education and Training</option>
            <option value="Freelance">Freelance and Consulting</option>
            <option value="Sales">Sales</option>
        </select>
        <br/>
        <button type="submit">Submit Job</button>
    </form>

</div>

<script src="script.js"></script>
<script>
    // Fetch jobs from the server using PHP
    fetch('get_jobs.php')
        .then(response => response.json())
        .then(jobs => displayJobs(jobs))
        .catch(error => console.error('Error fetching jobs:', error));

    function displayJobs(jobs) {
        const jobsList = document.getElementById('jobsList');

        // Clear existing content
        jobsList.innerHTML = '';

        // Display each job
        jobs.forEach(job => {
            const jobDiv = document.createElement('div');
            jobDiv.className = 'job';

            const jobTitle = document.createElement('h2');
            jobTitle.textContent = job.job_title;

            const jobDescription = document.createElement('p');
            jobDescription.textContent = job.job_description;

            const industry = document.createElement('p');
            industry.textContent = 'Industry: ' + job.industry;

            jobDiv.appendChild(jobTitle);
            jobDiv.appendChild(jobDescription);
            jobDiv.appendChild(industry);

            jobsList.appendChild(jobDiv);
        });
    }
</script>
</body>
</html>
