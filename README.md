# SumitAIInsight Website (v2 TDS)

This is the source code for the SumitAIInsight website, redesigned with a "Towards Data Science" aesthetic.

## How It Is Deployed (Antigravity Pipeline)

This website uses an **Automated CI/CD Pipeline** to deploy directly from GitHub to Hostinger.

**Workflow:**
1.  **Code Change:** You commit changes to the `main` branch on GitHub.
2.  **GitHub Actions:** A secure runner picks up the changes (defined in `.github/workflows/deploy.yml`).
3.  **FTP Upload:** The runner logs into your Hostinger server using secure Secrets.
4.  **Live Update:** Files are replaced in `public_html/`, updating `sumitaiinsight.com` instantly.

---

## Configuration Details

### 1. GitHub Secrets
The following secrets are configured in [Repo Settings > Secrets > Actions](https://github.com/saiin-prog/sumitai-insigh/settings/secrets/actions):
- `FTP_SERVER`: Your Hostinger IP or Hostname.
- `FTP_USERNAME`: Your FTP User.
- `FTP_PASSWORD`: Your FTP Password.

### 2. Deployment Workflow File
Located at: `.github/workflows/deploy.yml`

**Critical Configuration:**
```yaml
- name: 📂 Sync files
  uses: SamKirkland/FTP-Deploy-Action@v4.3.4
  with:
    # ... secrets ...
    server-dir: public_html/  # DEPLOYS TO ROOT
```

### 3. WordPress Conflict (Important)
Since this deploys to the same folder as WordPress:
- **`index.html`** (This Site) vs **`index.php`** (WordPress).
- **Resolution:** To see this site, you renamed `index.php` to `index_old.php`.
- **To Restore WordPress:** Delete/Rename `index.html` and rename `index_old.php` back to `index.php`.

---

## How to Update the Site
You do not need to touch FTP ever again.

1.  **Edit File:** Open `index.html` or `article.html` in your editor or on GitHub.
2.  **Make Changes:** Change text, images, or colors.
3.  **Push:**
    ```bash
    git add .
    git commit -m "Updated homepage headline"
    git push
    ```
4.  **Wait:** Check the "Actions" tab in GitHub. When it turns green (approx. 30s), your site is live.
