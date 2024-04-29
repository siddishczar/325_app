## This scraper is for Worcester DC.
import requests
from bs4 import BeautifulSoup
import mysql.connector
from mysql.connector import errorcode

# This is for Worcester DC
url = 'https://umassdining.com/menu/worcester-grab-n-go'
response = requests.get(url)
if response.status_code == 200:
    soup = BeautifulSoup(response.text, 'html.parser')
    h2tags = [soup.find('div', class_='breakfast_fp', id='content_text'), soup.find('div', class_='lunch_fp', id='content_text')]
    count = 0
    meal = ''
    dish_name_elements = h2tags[0].find_all(attrs={"data-dish-name": True})
    dish_names = [element['data-dish-name'] for element in dish_name_elements]
    dish_name_element = h2tags[1].find_all(attrs={"data-dish-name": True})
    dish_name = [element['data-dish-name'] for element in dish_name_element]
    try:
            cnx = mysql.connector.connect(user='ws_user', password='ws_user_123', host='127.0.0.1', database='mysqldb')
            cursor = cnx.cursor()
            cursor.execute("DELETE FROM woo_bk")
            add_drinks = ("INSERT INTO woo_bk (khana, type) VALUES (%s, %s)")
            for i in range(len(dish_names)):
                sodas = dish_names[i]
                data_drink = (sodas, 'breakfast')
                cursor.execute(add_drinks, data_drink)
            add_drink = ("INSERT INTO woo_bk (khana, type) VALUES (%s, %s)")
            for j in range(len(dish_name)):
                soda = dish_name[j]
                data_drinks = (soda, 'lunch')
                cursor.execute(add_drink, data_drinks)
            cnx.commit()
            cursor.close()
            cnx.close()
            
            
    except mysql.connector.Error as err:
            if err.errno == errorcode.ER_BAD_DB_ERROR:
                print("database does not exist")
            elif err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
                print("wrong credentials")
            else:
                print(err)
    
    
