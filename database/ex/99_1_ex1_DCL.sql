-- * 계정 및 권한 관리(DCL)

-- 1. 권한 확인
USE mysql;
SELECT * FROM user;
-- 또는
SELECT * FROM mysql.user;

-- 2. 계정 생성 (원래 localhost 대신 ip주소가 들어감)
CREATE user 'user1'@'localhost' IDENTIFIED BY 'user1';

-- 3. 계정에 권한 부여(DML 권한만 부여, 모든 권한을 부여하려면 ALL)
GRANT SELECT, INSERT, UPDATE, DELETE ON employees.* TO 'user1'@'localhost';

-- 4. 권한 삭제(SELECT 권한만 남기고 삭제)
REVOKE INSERT, UPDATE, DELETE ON employees.* FROM 'user1'@'localhost';

-- 5. 계정 삭제
DROP user 'user1'@'localhost';
