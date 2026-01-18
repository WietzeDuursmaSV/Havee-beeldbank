## SFTP configuratie (VS Code) – zonder wachtwoord

Dit project gebruikt **SFTP via SSH-keys** om bestanden automatisch te uploaden naar de server bij het opslaan (`uploadOnSave`).

Hierdoor:

- hoef je **geen wachtwoord** in te voeren
- staan er **geen wachtwoorden in de repo**
- is de verbinding **veilig (SSH)**

---

## Vereisten

- VS Code
- VS Code extensie: **SFTP (by Natizyskunk)**
- SSH-toegang tot de server

---

## Stap 1: SSH-key aanmaken (lokaal)

Controleer eerst of je al een SSH-key hebt:

```bash
ls ~/.ssh
```

Zie je `id_rsa` en `id_rsa.pub`?  
→ Ga door naar **Stap 2**

Zo niet, maak er één aan:

```bash
ssh-keygen -t rsa -b 4096
```

- Druk op **Enter** voor de standaard locatie
- Passphrase mag leeg blijven (of instellen als je dat wilt)

---

## Stap 2: SSH-key toevoegen aan de server

Log één keer in met wachtwoord:

```bash
ssh havee.nl@ssh.havee.nl
```

Maak de `.ssh` map (indien nodig):

```bash
mkdir -p ~/.ssh
chmod 700 ~/.ssh
```

Open het bestand voor toegestane keys:

```bash
nano ~/.ssh/authorized_keys
```

Plak hier de inhoud van je **lokale** public key:

```bash
cat ~/.ssh/id_rsa.pub
```

Zet daarna de juiste rechten:

```bash
chmod 600 ~/.ssh/authorized_keys
```

Log uit.

---

## Stap 3: VS Code SFTP configuratie

Maak of bewerk het bestand:

```
.vscode/sftp.json
```

```json
{
  "name": "Havee one",
  "host": "ssh.havee.nl",
  "protocol": "sftp",
  "port": 22,
  "username": "havee.nl",
  "privateKeyPath": "~/.ssh/id_rsa",
  "remotePath": "/customers/e/6/2/havee.nl/httpd.www/",
  "uploadOnSave": true,
  "useTempFile": false,
  "openSsh": false
}
```

⚠️ **Gebruik geen `password` veld**  
⚠️ Voeg `sftp.json` toe aan `.gitignore`

---

## Stap 4: Test de verbinding

In VS Code:

```
Ctrl + Shift + P → SFTP: Upload
```

Als alles goed staat:

- ❌ geen wachtwoordprompt
- ✅ bestand wordt geüpload

---

## Opmerkingen

- Elke keer dat je een bestand opslaat, wordt het **direct geüpload naar de server**
- Gebruik dit bij voorkeur niet direct op productie zonder backup
- Voor meerdere servers kun je een `~/.ssh/config` gebruiken

---

## Troubleshooting

**VS Code vraagt toch om een wachtwoord**

- Controleer of `privateKeyPath` klopt
- Controleer rechten op de server (`~/.ssh` = 700, `authorized_keys` = 600)
- Controleer of je key echt in `authorized_keys` staat
