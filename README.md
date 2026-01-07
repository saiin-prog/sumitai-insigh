# SumitAIInsight Website (v2 TDS)

This is the source code for the SumitAIInsight website, redesigned with a "Towards Data Science" aesthetic.

## Project Structure
- `index.html`: The main landing page.
- `article.html`: The template for individual articles (currently featuring "Email Security").
- `email-security/`: Category-specific folder (e.g., SPF, DKIM, DMARC article).
- `style.css`: The global stylesheet.

## How to Publish this Website to GitHub

Since this project is already a local git repository, follow these steps to publish it to the web using your GitHub account (`saiin-prog`).

### Step 1: Create a Repository on GitHub
1.  Log in to [GitHub.com](https://github.com).
2.  Click the **+** icon in the top-right corner and select **New repository**.
3.  **Repository name**: Enter `sumitai-insight` (or your preferred name).
4.  **Public/Private**: Choose **Public** (required for free GitHub Pages).
5.  **Initialize this repository with**: Leave all these unchecked (no README, no .gitignore). We are pushing an *existing* repository.
6.  Click **Create repository**.

### Step 2: Push Local Code to GitHub
Once the repository is created, you will see a "Quick setup" page. Copy the URL (it looks like `https://github.com/saiin-prog/sumitai-insight.git`).

Then, run the following commands in your terminal (locally):
```bash
# Link your local folder to the new GitHub repo
git remote add origin https://github.com/saiin-prog/sumitai-insight.git

# Rename the branch to main (best practice)
git branch -M main

# Push your files
git push -u origin main
```

### Step 3: Enable GitHub Pages (Live Website)
1.  Go to your repository on GitHub.
2.  Click **Settings** (top tab).
3.  On the left sidebar, verify under "Code and automation" -> **Pages**.
4.  Under **Build and deployment** > **Source**, select **Deploy from a branch**.
5.  Under **Branch**, select `main` and `/ (root)`, then click **Save**.
6.  Wait about 1-2 minutes. Refresh the page, and you will see your live URL (e.g., `https://saiin-prog.github.io/sumitai-insight/`).

## Future Updates
To publish new changes in the future:
1.  Make your edits.
2.  Run:
    ```bash
    git add .
    git commit -m "Description of changes"
    git push
    ```
