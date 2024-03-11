-- * 프로시저(Procedure)

-- 1. 프로시저 정의
DELIMITER $$
CREATE PROCEDURE test()
BEGIN 
	SELECT * FROM employees WHERE emp_no <= 10005;
END $$
DELIMITER ;

-- 2. 프로시저 호출
CALL test();

-- 3. 프로시저 삭제
DROP PROCEDURE test;