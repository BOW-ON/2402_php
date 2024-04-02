-- Review)
-- 1. null은 is로 작성
-- 2. 정렬 조건 2개일때 ,로 이어서 작성
-- 3. 집계함수는 where절에 작성 불가 > group by절에 작성


--  1. 탈퇴한 회원의 정보를 출력해 주세요.
SELECT *
FROM users
-- WHERE deleted_at <= NOW()
WHERE deleted_at IS NOT NULL
;



-- 2. 삭제 되지 않은 게시글을 조회수가 높은 순서(조회수가 같을 경우 작성일이 최신순으로)대로 출력해 주세요.

SELECT *
FROM boards
WHERE deleted_at IS NULL
ORDER BY views DESC, created_at DESC
;


-- 3. 찜한 게시글이 3개 이상인 회원의 번호를 출력해 주세요.
SELECT users.id
FROM users
	JOIN wishlists
		ON users.id = wishlists.user_id
GROUP BY wishlists.user_id HAVING COUNT(wishlists.user_id) >= 3
;


-- 4. 이메일이 'test_35@green.com'인 회원이 작성한 게시글의 정보를 수정일자가 최신순으로 출력해 주세요.

SELECT boards.*
FROM boards
	JOIN users
		ON users.id = boards.user_id
WHERE email = 'test_35@green.com'
ORDER BY updated_at DESC
;



-- 5. 탈퇴한 회원이 작성했던 게시글의 pk를 출력해 주세요.
SELECT boards.id
FROM boards
	JOIN users
		ON users.id = boards.user_id
WHERE users.deleted_at IS NOT NULL
;



-- 6. 이름이 '사람_173'이 작성한 게시글과 찜목록을 모두 삭제처리 해주세요.
UPDATE users
	JOIN boards
		ON users.id = boards.user_id
	JOIN wishlists
		ON users.id = wishlists.user_id
SET boards.deleted_at = NOW()
	,wishlists.deleted_at = NOW()
WHERE users.name = '사람_173'
;

-- 확인
-- SELECT boards.user_id, boards.deleted_at, wishlists.user_id, wishlists.deleted_at
-- FROM users
-- 	JOIN boards
-- 		ON users.id = boards.user_id
-- 	JOIN wishlists
-- 		ON users.id = wishlists.user_id
-- WHERE users.name = '사람_173'
-- ;

-- 7. 탈퇴한 회원이 작성했던 게시글을 모두 삭제처리 해주세요.
UPDATE users
	JOIN boards
		ON users.id = boards.user_id
SET boards.deleted_at = NOW()
WHERE users.deleted_at IS NOT NULL
;

-- 확인
-- SELECT boards.*
-- FROM users
-- 	JOIN boards
-- 		ON users.id = boards.user_id
-- WHERE users.deleted_at IS NOT NULL

-- 8. 가입일이 2020년 이후인 회원이 찜한 게시글의 제목과 내용을 출력해 주세요.
SELECT boards.title, boards.content
FROM users
	JOIN boards
		ON users.id = boards.user_id
WHERE users.created_at >= 20200101
;
