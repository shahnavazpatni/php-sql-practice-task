/*
Get List of Students Passed in Maths and Science for Class 1st and 2nd.
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
WHERE 
    (class_master.class_name = '1st' OR class_master.class_name = '2nd')
    AND subject_master.subject_name IN ('Maths', 'Science')
    AND marks_master.marks >= 35;