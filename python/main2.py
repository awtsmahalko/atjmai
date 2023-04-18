import pandas as pd
import numpy as np

# load job listing data from CSV file
job_listings = pd.read_csv('job_listing.csv')

# define job seeker preferences
preferences = {
    'industry': 'Technology',
    'job_function': 'Software Development',
    'location': 'San Francisco, CA',
    'salary_range': '90000 - 130000',
    'work_schedule': 'Full-time'
}

# define matching criteria
criteria = [
    (job_listings.industry == preferences['industry']),
    (job_listings.job_function == preferences['job_function']),
    ((job_listings.location.str.contains(preferences['location'])) | (job_listings.location == preferences['location'])),
    (job_listings.salary_range == preferences['salary_range']),
    (job_listings.work_schedule == preferences['work_schedule'])
]

# filter job listings based on criteria
filtered_jobs = job_listings[np.logical_and.reduce(criteria)]

# calculate match percentage for each job listing
match_percentages = []
for index, job in filtered_jobs.iterrows():
    match_score = 0
    if job.industry == preferences['industry']:
        match_score += 1
    if job.job_function == preferences['job_function']:
        match_score += 1
    if job.location == preferences['location']:
        match_score += 1
    else:
        if job.location.startswith(preferences['location'].split(',')[0]):
            match_score += 0.5
    salary_range = preferences['salary_range'].replace(',', '').split('-')
    salary_min = int(salary_range[0].strip())
    salary_max = int(salary_range[1].strip())
    job_salary_range = job['salary_range']
    job_salary_range = job_salary_range.replace(',', '').split('-')
    job_salary_min = int(job_salary_range[0].strip())
    job_salary_max = int(job_salary_range[1].strip())
    if job_salary_min <= salary_min and job_salary_max >= salary_max:
        match_score += 1
    else:
        if job_salary_min <= salary_min or job_salary_max >= salary_max:
            match_score += 0.5
    if job.work_schedule == preferences['work_schedule']:
        match_score += 1
    match_percentage = match_score / 5 * 100
    match_percentages.append(match_percentage)

# add match percentage column to filtered jobs dataframe
filtered_jobs['match_percentage'] = match_percentages

# sort jobs by match percentage in descending order and display top 5 jobs
top_jobs = filtered_jobs.sort_values(by='match_percentage', ascending=False).head(5)
for index, job in top_jobs.iterrows():
    print(f"Job Title: {job.job_title}")
    print(f"Industry: {job.industry}")
    print(f"Job Function: {job.job_function}")
    print(f"Location: {job.location}")
    print(f"Salary Range: {job.salary_range}")
    print(f"Work Schedule: {job.work_schedule}")
    print(f"Match Percentage: {job.match_percentage:.2f}%")
    print(f"Description: {job.description}")
    print()
