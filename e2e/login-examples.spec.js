// @ts-check
import { test, expect } from '@playwright/test';

test('can login', async ({ page }) => {
    await page.goto('/cp');

    await expect(page).toHaveURL('/cp/auth/login');
    await expect(page).toHaveTitle('Log in ‹ Statamic');
    await expect(page.locator('body')).toContainText(/Email/);
    await expect(page.locator('body')).toContainText(/Password/);

    await page.fill('input[name="email"]', 'jesseleite@example.com');
    await page.fill('input[name="password"]', 'saints');
    await page.click('button[type="submit"]');

    await expect(page).toHaveURL('/cp/dashboard');
    await expect(page.locator('body')).toContainText('Dashboard');
    await expect(page.locator('body')).toContainText('Getting Started with Statamic');
});

test('requires valid password', async ({ page }) => {
    await page.goto('/cp');

    await expect(page).toHaveURL('/cp/auth/login');
    await expect(page).toHaveTitle('Log in ‹ Statamic');
    await expect(page.locator('body')).toContainText(/Email/);
    await expect(page.locator('body')).toContainText(/Password/);

    await page.fill('input[name="email"]', 'jesseleite@example.com');
    await page.fill('input[name="password"]', 'wrong password!');
    await page.click('button[type="submit"]');

    await expect(page).toHaveURL('/cp/auth/login');
    await expect(page).toHaveTitle('Log in ‹ Statamic');
    await expect(page.locator('body')).toContainText(/Email/);
    await expect(page.locator('body')).toContainText(/Password/);
});
