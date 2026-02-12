import puppeteer from 'puppeteer';  
  
(async () = 
  const browser = await puppeteer.launch();  
  const page = await browser.newPage();  
  await page.goto('http://a-site.by/');  
  await page.screenshot({ path: 'screenshot.png', fullPage: true });  
  await browser.close();  
})(); 
