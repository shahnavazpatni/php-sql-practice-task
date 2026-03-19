/*
Get List of Students Top in Each Subject City Wise.
*/

SELECT 
    student_master.student_name,
    class_master.class_name,
    section_master.section_name,
    city_master.city_name,
    subject_master.subject_name,
    marks_master.marks
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
JOIN 
    subject_master ON marks_master.subject_id = subject_master.id
JOIN (
    SELECT 
        city_master.city_name,
        subject_master.subject_name,
        MAX(marks_master.marks) AS max_marks
    FROM 
        marks_master
    JOIN 
        student_master ON marks_master.student_id = student_master.id
    JOIN 
        city_master ON student_master.city_id = city_master.id
    JOIN 
        subject_master ON marks_master.subject_id = subject_master.id
    GROUP BY 
        city_master.city_name, 
        subject_master.subject_name
) AS top_marks 
ON 
    city_master.city_name = top_marks.city_name 
    AND subject_master.subject_name = top_marks.subject_name 
    AND marks_master.marks = top_marks.max_marks
     
ORDER BY
    city_master.city_name,
    subject_master.subject_name;