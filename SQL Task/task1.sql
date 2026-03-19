/*
Task 1 : 1. Get the Highest marks for Each Subject.
*/


/*
Class Wise
*/
SELECT 
    class_master.class_name, 
    subject_master.subject_name, 
    MAX(marks_master.marks) AS highest_marks
FROM 
    marks_master
JOIN 
    student_master ON marks_master.student_id = student_master.id
JOIN 
    class_master ON student_master.class_id = class_master.id
JOIN 
    subject_master ON marks_master.subject_id = subject_master.id
GROUP BY 
    class_master.class_name, subject_master.subject_name;


/*
Class and Section Wise
*/
SELECT 
    class_master.class_name, 
    section_master.section_name, 
    subject_master.subject_name, 
    MAX(marks_master.marks) AS highest_marks
FROM 
    marks_master
JOIN 
    student_master ON marks_master.student_id = student_master.id
JOIN 
    class_master ON student_master.class_id = class_master.id
JOIN 
    section_master ON student_master.section_id = section_master.id
JOIN 
    subject_master ON marks_master.subject_id = subject_master.id
GROUP BY 
    class_master.class_name, section_master.section_name, subject_master.subject_name;