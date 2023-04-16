# Arrette et suprime les conteneurs
docker-compose down
# Construit l'image
docker-compose build
# Lance le build de l'environnement
docker-compose -f docker-compose.prod.yml up -d