pipeline {
    agent any
    stages {
        stage("Build") {
            environment {
                DB_HOST = credentials("127.0.0.1")
                DB_DATABASE = credentials("laravel")
                DB_USERNAME = credentials("root")
                DB_PASSWORD = credentials("")
            }
            steps {
                sh 'php --version'
                sh 'composer install'
                sh 'composer --version'
                sh 'npm i'
                sh 'cp .env.example .env'
                sh 'echo DB_HOST=${DB_HOST} >> .env'
                sh 'echo DB_USERNAME=${DB_USERNAME} >> .env'
                sh 'echo DB_DATABASE=${DB_DATABASE} >> .env'
                sh 'echo DB_PASSWORD=${DB_PASSWORD} >> .env'
                sh 'php artisan key:generate'
                sh 'php artisan jwt:secret'
                sh 'php artisan migrate:refresh --seed'
            }
        }
        stage("Test") {
            steps {
                sh 'php artisan test'
            }
        }
    }
}