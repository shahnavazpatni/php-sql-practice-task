/*
Get list of Students Passed in Maths and Hindi but Failed in Science.
*/

SELECT 
    student_master.student_name,
    class_master.class_name,
    section_master.section_name,
    city_master.city_name
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
WHERE 
    marks_master.student_id IN (
        SELECT student_id
        FROM marks_master
        WHERE subject_id IN (
            SELECT id FROM subject_master WHERE subject_name = 'Maths' AND marks >= 35
        ) 
        AND student_id IN (
            SELECT student_id
            FROM marks_master
            WHERE subject_id IN (
                SELECT id FROM subject_master WHERE subject_name = 'Hindi' AND marks >= 35
            )
        ) 
        AND student_id IN (
            SELECT student_id
            FROM marks_master
            WHERE subject_id IN (
                SELECT id FROM subject_master WHERE subject_name = 'Science' AND marks < 35
            )
        )
    );