import { Page, Locator } from '@playwright/test';

export class CP {
    constructor(page) {
        this.page = page;
    }

    async login() {
        await this.page.goto('/cp');
        await this.page.fill('input[name="email"]', 'jesseleite@example.com');
        await this.page.fill('input[name="password"]', 'saints');
        await this.page.click('button[type="submit"]');
    }
}
