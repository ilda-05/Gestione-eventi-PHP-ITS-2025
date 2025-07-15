# Gestione Eventi PHP - Docker

## 🚀 Come avviare il progetto

### Prerequisiti
- Docker
- Docker Compose

### Avvio
```bash
# Clona il repository o naviga nella directory del progetto
cd Gestione-eventi-PHP-ITS-2025

# Avvia i container
docker-compose up -d

# Oppure per vedere i logs in tempo reale
docker-compose up
```

### Accesso all'applicazione
- **Applicazione**: http://localhost:8080
- **Cambia utente**: http://localhost:8080/index.php?user=NomeUtente
- **Reset sessione**: http://localhost:8080/index.php?reset

### Comandi utili
```bash
# Ferma i container
docker-compose down

# Ricostruisci l'immagine (dopo modifiche al Dockerfile)
docker-compose up --build

# Vedi i logs
docker-compose logs -f web

# Accedi al container
docker-compose exec web bash
```

### Struttura
- **Porta**: L'app gira sulla porta 8080 (mappata dalla 80 del container)
- **Volume**: I dati JSON sono persistenti nella cartella `./data`
- **PHP**: Versione 8.2 con Apache

### Troubleshooting
- Se la porta 8080 è occupata, modifica `docker-compose.yml` e cambia `8080:80` con `8081:80`
- I permessi della cartella `data` sono automaticamente impostati per la scrittura
