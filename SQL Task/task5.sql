/*
    Get list of Students Failed in English and Hindi for Class 3rd or 4th.
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
    (class_master.class_name = '3rd' OR class_master.class_name = '4th')
    AND subject_master.subject_name IN ('English', 'Hindi')
    AND marks_master.marks < 35;