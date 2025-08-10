SARDEGNADREAM
Simulatore sito case vacanze


REQUISITI:
- Docker 
- Simulatore server SMTP (per esempio Mailtrap)



-----------------  Procedura primo avvio  --------------------

1) Clonare progetto da Github:
    - git clone https://github.com/Carlo1987/sardegnadream.git


2) Avviare containers Docker:
    - cd sardegnadream
    - docker compose up -d


3) FRONTEND --> Creare env.ts e aggiornare dipendenze:
    - cd frontend
    - creare src/env.ts copiandolo da src/env.example.ts
    - npm install

4) BACKEND --> Creare .env, ggiornare dipendenze, fare la build, lanciare migrazioni e seeders:
    - cd backend
    - creare .env e compilarlo seguendo l'esempio .env.example 
    - composer install
    - npm install
    - npm run build
    - docker exec sardegnadream-backend php artisan migrate
    - docker exec sardegnadream-backend php artisan db:seed

5) Se necessario, riavviare i containers:
    - docker compose down
    - docker compose up -d