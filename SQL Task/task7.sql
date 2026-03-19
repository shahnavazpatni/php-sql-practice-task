/*
7. Get list of students' percentages and display their grades based on the following
criteria
● Display "A Grade" if the average is between 80 and 100.
● Display "B Grade" if the average is between 70 and 79.
● Display "C Grade" if the average is below 70.
*/

SELECT 
    student_master.student_name,
    class_master.class_name,
    section_master.section_name,
    city_master.city_name,
    AVG(marks_master.marks) AS average_marks,
    CASE 
        WHEN AVG(marks_master.marks) BETWEEN 80 AND 100 THEN 'A Grade'
        WHEN AVG(marks_master.marks) BETWEEN 70 AND 79 THEN 'B Grade'
        ELSE 'C Grade'
    END AS grade
FROM 
    marks_master
JOIN 
    student_master ON marks_master.student_id = student_master.id
JOIN 
    class_master ON student_master.class_id = class_master.id
JOIN 
    section_master ON student_master.section_id = section_master.id
JOIN 
    city_master ON student_master.city_id = city_master.id
GROUP BY 
    student_master.student_name, class_master.class_name, section_master.section_name, city_master.city_name;