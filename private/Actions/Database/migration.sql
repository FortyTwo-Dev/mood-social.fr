CREATE TABLE RIGHTS (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    updated_at DATETIME DEFAULT NOW() ON UPDATE NOW(),
    created_at DATETIME DEFAULT NOW()
);

CREATE TABLE ROLES (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    updated_at DATETIME DEFAULT NOW() ON UPDATE NOW(),
    created_at DATETIME DEFAULT NOW()
);

CREATE TABLE ROLE_RIGHT (
    role_id INT REFERENCES ROLES(id),
    right_id INT REFERENCES RIGHTS(id),
    PRIMARY KEY (role_id, right_id)
);

CREATE TABLE SUBSCRIPTIONS (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50),
    type VARCHAR(50),
    updated_at DATETIME DEFAULT NOW() ON UPDATE NOW(),
    created_at DATETIME DEFAULT NOW()
);

CREATE TABLE USERS (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    email VARCHAR(200) UNIQUE,
    password VARCHAR(255),
    profile_photo_path VARCHAR(255),
    state INT,
    visibility INT,
    street VARCHAR(100),
    city VARCHAR(50),
    country VARCHAR(50),
    updated_at DATETIME DEFAULT NOW() ON UPDATE NOW(),
    created_at DATETIME DEFAULT NOW(),
    role_id INT NOT NULL DEFAULT 1 REFERENCES ROLES(id),
    subscription_id INT NOT NULL DEFAULT 1 REFERENCES SUBSCRIPTIONS(id),
    subscription_updated_at INT CHECK(subscription_updated_at>=0),
    email_verified_at VARCHAR(255)
    email_verification_token VARCHAR(255),
    email_verification_expiration INT CHECK(email_verification_expiration>=0)
);

CREATE TABLE TALKS (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    type VARCHAR(50),
    description VARCHAR(255),
    updated_at DATETIME DEFAULT NOW() ON UPDATE NOW(),
    created_at DATETIME DEFAULT NOW()
);

CREATE TABLE EVENTS (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    description VARCHAR(255),
    updated_at DATETIME DEFAULT NOW() ON UPDATE NOW(),
    created_at DATETIME DEFAULT NOW(),
    talk_id INT UNIQUE NOT NULL REFERENCES TALKS(id)
);

CREATE TABLE MESSAGES (
    id INT AUTO_INCREMENT PRIMARY KEY,
    content TEXT,
    path VARCHAR(255),
    updated_at DATETIME DEFAULT NOW() ON UPDATE NOW(),
    created_at DATETIME DEFAULT NOW(),
    user_id INT NOT NULL REFERENCES USERS(id),
    talk_id INT NOT NULL REFERENCES TALKS(id)
);

CREATE TABLE MESSAGE_LIKES (
    user_id INT REFERENCES USERS(id),
    message_id INT REFERENCES MESSAGES(id),
    PRIMARY KEY (user_id, message_id)
);

CREATE TABLE REACTIONS (
    id INT AUTO_INCREMENT PRIMARY KEY,
    reaction VARCHAR(50),
    updated_at DATETIME DEFAULT NOW() ON UPDATE NOW(),
    created_at DATETIME DEFAULT NOW()
);

CREATE TABLE USER_MESSAGE_REACTION (
    user_id INT REFERENCES USERS(id),
    message_id INT REFERENCES MESSAGES(id),
    reaction_id INT REFERENCES REACTIONS(id),
    PRIMARY KEY (user_id, message_id, reaction_id)
);

CREATE TABLE FRIENDS (
    sender_user_id INT REFERENCES USERS(id),
    receiver_user_id INT REFERENCES USERS(id),
    state INT,
    updated_at DATETIME DEFAULT NOW() ON UPDATE NOW(),
    created_at DATETIME DEFAULT NOW(),
    PRIMARY KEY (sender_user_id, receiver_user_id)
);

CREATE TABLE FOLLOWERS (
    sender_user_id INT REFERENCES USERS(id),
    receiver_user_id INT REFERENCES USERS(id),
    state INT,
    updated_at DATETIME DEFAULT NOW() ON UPDATE NOW(),
    created_at DATETIME DEFAULT NOW(),
    PRIMARY KEY (sender_user_id, receiver_user_id)
);

CREATE TABLE EXCHANGES (
    sender_user_id INT REFERENCES USERS(id),
    receiver_user_id INT REFERENCES USERS(id),
    content TEXT,
    file_path VARCHAR(250),
    updated_at DATETIME DEFAULT NOW() ON UPDATE NOW(),
    created_at DATETIME DEFAULT NOW(),
    PRIMARY KEY (sender_user_id, receiver_user_id)
);

CREATE TABLE USER_EXCHANGE_REACTION (
    user_id INT REFERENCES USERS(id),
    exchange_id INT REFERENCES EXCHANGES(id),
    reaction_id INT REFERENCES REACTIONS(id),
    PRIMARY KEY (user_id, exchange_id, reaction_id)
);

CREATE TABLE USER_TALK (
    user_id INT REFERENCES USERS(id),
    talk_id INT REFERENCES TALKS(id),
    PRIMARY KEY (user_id, talk_id)
);

CREATE TABLE USER_EVENT (
    user_id INT REFERENCES USERS(id),
    event_id INT REFERENCES EVENTS(id),
    PRIMARY KEY (user_id, event_id)
);

CREATE TABLE USER_MOOD (
    user_id INT REFERENCES USERS(id),
    mood_id INT REFERENCES MOODS(id),
    attached_at DATETIME DEFAULT NOW(),
    PRIMARY KEY (user_id, mood_id)
);

CREATE TABLE EVENT_LIKES (
    user_id INT REFERENCES USERS(id),
    event_id INT REFERENCES EVENTS(id),
    PRIMARY KEY (user_id, event_id)
);

CREATE TABLE MOODS (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(20),
    color VARCHAR(10),
    text_color VARCHAR(10),
    updated_at DATETIME DEFAULT NOW() ON UPDATE NOW(),
    created_at DATETIME DEFAULT NOW()
);

CREATE TABLE CAPTCHAS (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50),
    content VARCHAR(50),
    question VARCHAR(200),
    answer VARCHAR(200),
    updated_at DATETIME DEFAULT NOW() ON UPDATE NOW(),
    created_at DATETIME DEFAULT NOW(),
    user_id INT NOT NULL REFERENCES USERS(id)
);

CREATE TABLE LOGS (
    id INT AUTO_INCREMENT PRIMARY KEY,
    status VARCHAR(4),
    ip VARCHAR(45),
    requested_at DATETIME DEFAULT NOW(),
    user_id INT NULL REFERENCES USERS(id),
    script_name VARCHAR(255),
    http_referer VARCHAR(255),
    request_uri VARCHAR(255),
    request_method VARCHAR(255),
    server_protocol VARCHAR(255),
    http_user_agent VARCHAR(255)
);

CREATE TABLE NEWSLETTERS (
    id INT AUTO_INCREMENT PRIMARY KEY,
    object VARCHAR(255),
    content TEXT,
    created_at DATETIME DEFAULT NOW(),
    user_id INT NOT NULL REFERENCES USERS(id)
)