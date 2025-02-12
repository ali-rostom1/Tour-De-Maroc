CREATE TYPE badge_type AS ENUM ('bronze', 'silver', 'gold');
CREATE TYPE categorie_type AS ENUM ('MONTAGNE', 'PLAINE', 'TERRAIN', 'VELODROME');
CREATE TYPE reference_type AS ENUM ('ETAPE', 'COURSE', 'CYCLISTE');
CREATE TYPE media_type AS ENUM ('IMAGE', 'VIDEO');
CREATE TYPE comment_status AS ENUM ('active', 'hidden');
CREATE TYPE statut_general AS ENUM ('encours', 'ferme');
CREATE TYPE type_erreur AS ENUM ('ERREUR_TEMPS', 'ERREUR_CLASSEMENT', 'AUTRE');

CREATE TABLE role (
    role_id SERIAL PRIMARY KEY,
    nom VARCHAR(50) UNIQUE NOT NULL -- Ex: 'admin', 'cycliste', 'fan'
);

CREATE TABLE user (
    user_id SERIAL PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role_id INTEGER NOT NULL REFERENCES role(role_id)
);


CREATE TABLE badge (
    badge_id SERIAL PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    type badge_type,
    image VARCHAR(255),
    pointsRequis INTEGER NOT NULL
);

CREATE TABLE equipe (
    equipe_id SERIAL PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    pays VARCHAR(100) NOT NULL
);

CREATE TABLE admin (
    CHECK (role = 'admin')
) INHERITS (user);
ALTER TABLE admin ADD PRIMARY KEY (user_id);


CREATE TABLE cycliste (
    dateNaissance DATE NOT NULL,
    nationalite VARCHAR(100) NOT NULL,
    equipe_id INTEGER REFERENCES equipe(equipe_id),
    poids DOUBLE PRECISION, 
    biographie TEXT,
    CHECK (role = 'cycliste')
) INHERITS (user);
ALTER TABLE cycliste ADD PRIMARY KEY (user_id);

CREATE TABLE fan (
    pointsTotal INTEGER DEFAULT 0,
    badge_id INTEGER REFERENCES badge(badge_id) ON DELETE SET NULL DEFAULT NULL
    CHECK (role = 'fan')
) INHERITS (user);

ALTER TABLE fan ADD PRIMARY KEY (user_id);

CREATE TABLE historique (
    historique_id SERIAL PRIMARY KEY,
    evenement VARCHAR(255) NOT NULL,
    description TEXT,
    dateEvenement DATE NOT NULL,
    classement INTEGER ,
    cycliste_id INTEGER REFERENCES cycliste(cycliste_id) ON DELETE CASCADE
);

CREATE TABLE course (
    course_id SERIAL PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    annee INTEGER NOT NULL,
    nombreEtapes INTEGER NOT NULL,
    date_debut DATE NOT NULL,
    date_fin DATE NOT NULL,
    statut statut_general NOT NULL DEFAULT 'encours'
);

CREATE TABLE etape (
    etape_id SERIAL PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    distance DOUBLE PRECISION NOT NULL,
    lieuDepart VARCHAR(255) NOT NULL,
    lieuArrivee VARCHAR(255) NOT NULL,
    statut statut_general NOT NULL DEFAULT 'encours',
    description TEXT,
    categorie_id INTEGER REFERENCES categorie(categorie_id) ON DELETE CASCADE,
    course_id INTEGER REFERENCES course(course_id) ON DELETE CASCADE,
    statut statut_general NOT NULL DEFAULT 'encours'
);

CREATE TABLE document (
    document_id SERIAL PRIMARY KEY,
    url VARCHAR(255) NOT NULL,
);

CREATE TABLE image (
    user_id INTEGER REFERENCES user(user_id)  ON DELETE CASCADE,
    is_profil BOOLEAN DEFAULT false
)INHERITS (document);

ALTER TABLE image ADD PRIMARY KEY (document_id);

CREATE TABLE video (
    typeReference reference_type NOT NULL,
    course_id INTEGER REFERENCES course(course_id) DEFAULT NULL ON DELETE CASCADE,
    etape_id INTEGER REFERENCES etape(etape_id) DEFAULT NULL ON DELETE CASCADE,
)INHERITS (document);

ALTER TABLE video ADD PRIMARY KEY (document_id);


CREATE TABLE performance_course (
    id SERIAL PRIMARY KEY,
    classementGeneral INTEGER,
    pointsTotal INTEGER NOT NULL,
    pointsGrimpeur INTEGER NOT NULL,
    pointsSprint INTEGER NOT NULL,
    cycliste_id INTEGER REFERENCES cycliste(cycliste_id),
    course_id INTEGER REFERENCES course(course_id)
);

CREATE TABLE resultat_etape (
    id SERIAL PRIMARY KEY,
    tempsDepart TIME NOT NULL,
    tempsArrivee TIME NOT NULL,
    pointsEtape INTEGER NOT NULL,
    classementEtape INTEGER NOT NULL,
    etape_id INTEGER REFERENCES etape(etape_id),
    cycliste_id INTEGER REFERENCES cycliste(cycliste_id)
);


CREATE TABLE question (
    question_id SERIAL PRIMARY KEY,
    fan_id INTEGER REFERENCES fan(user_id),
    cycliste_id INTEGER REFERENCES cycliste(user_id),
    question TEXT NOT NULL
);

CREATE TABLE reponse (
    reponse_id SERIAL PRIMARY KEY,
    reponse TEXT NOT NULL,
    question_id INTEGER REFERENCES question(question_id)
);

CREATE TABLE categorie (
    categorie_id SERIAL PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    description TEXT,
    type categorie_type NOT NULL,
    basePoints INTEGER NOT NULL,
    coefficient DOUBLE PRECISION NOT NULL
);

CREATE TABLE favoris (
    fan_id INTEGER REFERENCES fan(user_id),
    cycliste_id INTEGER REFERENCES cycliste(user_id),
    PRIMARY KEY (fan_id, cycliste_id)
);

CREATE TABLE signale (
    fan_id INTEGER REFERENCES fan(user_id),
    etape_id INTEGER REFERENCES etape(etape_id),
    description TEXT NOT NULL,
    type type_erreur NOT NULL,
    dateCreation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (fan_id, etape_id)
);
CREATE TABLE signal (
    id SERIAL PRIMARY KEY,
    idFan INTEGER REFERENCES fan(user_id),
    idEtape INTEGER REFERENCES etape(etape_id),
    type type_erreur NOT NULL,
    description VARCHAR(255) NOT NULL,
    statut statut_signal DEFAULT 'EN_ATTENTE',
    dateCreation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE likes (
    fan_id INTEGER REFERENCES fan(user_id),
    etape_id INTEGER REFERENCES etape(user_id),
    PRIMARY KEY (fan_id, etape_id)
);

CREATE TABLE inscription (
    fan_id INTEGER REFERENCES fan(user_id),
    etape_id INTEGER REFERENCES etape(user_id),
    PRIMARY KEY (fan_id, etape_id)
);

CREATE TABLE comment (
    comment_id SERIAL PRIMARY KEY,
    contenu TEXT NOT NULL,
    statut comment_status ,
    dateCreation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fan_id INTEGER REFERENCES fan(user_id),
    etape_id INTEGER REFERENCES etape(user_id)
);


-- Example of inserting data with inheritance
-- Insert an admin
INSERT INTO admin (nom, email, password, role)
VALUES ('Admin Name', 'admin@example.com', 'hashedpassword', 'admin');

-- Insert a cyclist
INSERT INTO cycliste (nom, email, password, role, dateNaissance, nationalite)
VALUES ('Cyclist Name', 'cyclist@example.com', 'hashedpassword', 'cyclist', '1990-01-01', 'French');

-- Insert a fan
INSERT INTO fan (nom, email, password, role, pointsTotal)
VALUES ('Fan Name', 'fan@example.com', 'hashedpassword', 'fan', 0);

-- Query examples
-- Get all users including all types
SELECT * FROM users;

-- Get only cyclists
SELECT * FROM ONLY cycliste;

-- Get only fans
SELECT * FROM ONLY fan;

-- Get only admins
SELECT * FROM ONLY admin;
