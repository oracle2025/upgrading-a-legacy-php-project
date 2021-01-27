pipeline {
	agent {
		docker { image 'php:5.3' }
	}
	stages {
		stage('Php Version') {
			steps {
				sh 'php --version'
			}
		}
	}
}
