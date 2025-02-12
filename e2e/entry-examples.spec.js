// @ts-check
import { test, expect } from '@playwright/test';
import { CP } from './fixtures/cp';

test.beforeEach(async ({ page }) => {
    await new CP(page).login();
});

test('can create page', async ({ page }) => {
    await page.goto('/cp/collections/pages/entries/create/default');

    await page.fill('input[name="title"]', 'Football');
    await page.click('button:text("Save & Publish")');

    await expect(page).toHaveURL('/cp/collections/pages?site=default');

    await expect(page.locator('body')).toContainText('Home');
    await expect(page.locator('body')).not.toContainText('Football');
});
