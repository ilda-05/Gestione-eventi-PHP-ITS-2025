# 🎉 Gestione Eventi PHP - Docker

Sistema di gestione eventi con PHP, sessioni e containerizzazione Docker.

## 🚀 Avvio Rapido

### Prerequisiti
- **Docker Desktop** installato e in esecuzione
- Git per clonare il repository

### Installazione e Avvio
```bash
# 1. Clona il repository
git clone https://github.com/ilda-05/Gestione-eventi-PHP-ITS-2025.git
cd Gestione-eventi-PHP-ITS-2025

# 2. Avvia con Docker (TUTTO AUTOMATICO)
docker-compose up
```

**STOP.** Basta così! L'app sarà su http://localhost:8080

### 🌐 Accesso
- **Applicazione**: http://localhost:8080
- **Cambio utente**: http://localhost:8080?user=NomeUtente
- **Reset sessione**: http://localhost:8080?reset

## 🔧 Comandi Utili
```bash
# Avvia in background
docker-compose up -d

# Ferma container
docker-compose down

# Ricostruisci dopo modifiche al Dockerfile
docker-compose up --build

# Vedi logs
docker-compose logs -f eventi-php

# Riavvia solo il container (senza rebuild)
docker-compose restart
```

## 🔄 Sviluppo in Tempo Reale
- ✅ **Hot Reload**: Le modifiche ai file PHP sono immediate
- ✅ **No Rebuild**: Non serve ricostruire per ogni modifica
- ✅ **Volume Mount**: `./progetto` → `/var/www/html` in tempo reale

## 📱 Funzionalità
- ✅ CRUD completo per eventi
- ✅ Gestione sessioni utente
- ✅ Conteggio operazioni
- ✅ Flash messages
- ✅ Persistenza dati JSON
- ✅ Containerizzazione Docker

## 🐛 Troubleshooting

### Se non funziona
```bash
# Solo se proprio non va, ricostruisci:
docker-compose up --build
```

**Il 99% delle volte basta solo `docker-compose up`** ✅

### Altri problemi rari
- **Porta occupata**: Cambia `8080:80` in `8081:80` nel docker-compose.yml  
- **Docker non parte**: Assicurati che Docker Desktop sia in esecuzione

## 🏗️ Struttura
```
progetto/
├── index.php           # Homepage
├── add.php            # Aggiungi evento
├── edit.php           # Modifica evento
├── delete.php         # Elimina evento
├── data/              # Dati JSON
├── includes/          # Funzioni e sessioni
└── views/             # Template HTML
```