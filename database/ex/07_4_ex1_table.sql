-- *DB 생성
CREATE DATABASE test;

-- *DB 선택
USE test;

-- *TABLE 생성
-- 1. 회원 테이블
CREATE TABLE users (
	user_id 			INT				PRIMARY KEY AUTO_INCREMENT
	,user_name 		VARCHAR(50)		NOT NULL
	,user_tel 		VARCHAR(20) 	NOT NULL COMMENT '-를 제외한 숫자'
	,user_addr 		VARCHAR(150) 	NOT NULL
	,user_birth_at DATE 				NOT NULL COMMENT 'YYYY-MM-DD'
	,user_gender 	CHAR(1) 			NOT NULL COMMENT '0 : 남자, 1 : 여자'
	,created_at 	DATETIME 		NOT NULL DEFAULT CURRENT_TIMESTAMP() COMMENT 'YYYY-MM-DD hh:mi:ss'
	,deleted_at 	DATETIME 		NOT NULL COMMENT 'YYYY-MM-DD hh:mi:ss'
);
-- 2. 상품 목록 테이블
CREATE TABLE products (
	product_id 		INT 				PRIMARY KEY AUTO_INCREMENT
	,product_name 	VARCHAR(200)	NOT NULL
	,product_price INT 				NOT NULL
	,created_at		DATETIME 		NOT NULL DEFAULT CURRENT_TIMESTAMP() COMMENT 'YYYY-MM-DD hh:mi:ss'
	,updated_at 	DATETIME 		NOT NULL DEFAULT CURRENT_TIMESTAMP() COMMENT 'YYYY-MM-DD hh:mi:ss'
	,deleted_at 	DATETIME 		COMMENT 'YYYY-MM-DD hh:mi:ss'
);

-- 3. 주문 일자 테이블
CREATE TABLE orders (
	order_id			INT			PRIMARY KEY AUTO_INCREMENT
	,user_id			INT			NOT NULL
	,product_id		INT			NOT null
	,payment_type	CHAR(1)		NOT NULL	DEFAULT '0'	COMMENT '0 : 결제전, 1 : 카드, 2 : 계좌이체'
 );
 
-- *ALTER TABLE : 테이블의 구조를 수정하는 SQL
-- 1. FK 추가 ( CONSTRAINT 제약조건명_테이블명_해당컬럼 )
ALTER TABLE orders ADD CONSTRAINT fk_orders_user_id FOREIGN KEY (user_id) REFERENCES users(user_id);
ALTER TABLE orders ADD CONSTRAINT fk_orders_product_id FOREIGN KEY (product_id) REFERENCES products(product_id);

-- 2. 새로운 컬럼 추가
-- users 테이블에 회원id가 추가가 필요 ( COLUMN 테이블명_컬럼명 )
ALTER TABLE users ADD COLUMN user_member_id VARCHAR(100) NOT NULL;
-- UNIQUE 추가하기
--		(위 코드 NOT NULL뒤에 UNIQUE를 작성해도 되지만 별도로 작성해도 됨)
ALTER TABLE users ADD CONSTRAINT uk_users_user_member_id UNIQUE (user_member_id);

-- 3. UK 삭제
ALTER TABLE users DROP CONSTRAINT uk_users_user_member_id;

-- 4. 변경
-- user_member_id 데이터타입 변경
-- 원래 있던 제약 조건을 모두 작성해야됨 (not null 까지)
ALTER TABLE users MODIFY COLUMN user_member_id VARCHAR(150) NOT NULL;
-- but) varchar을 줄이면 기존에 저장되어있던 데이터가 삭제될 수도 있기 때문에 줄이는 것은 주의!

-- *삭제
-- 1. 테이블 삭제 ( 되돌릴수 없음)
DROP TABLE orders;
DROP TABLE users, products;

-- 2. 데이터 베이스 삭제
DROP DATABASE test;

-- 3. TRUNCATE TABLE : 테이블의 모든 데이터를 삭제
-- 로그를 남기지 않아서 속도가 빠르지만 rollback과 commit을 하지 못해서 되돌릴 방법이 없음
TRUNCATE TABLE titles;

