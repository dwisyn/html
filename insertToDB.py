#!/usr/bin/env python
#https://stackoverflow.com/questions/33110992/python-code-for-bluetooth-throws-error-after-i-had-to-reset-the-adapter
"""
A simple test server that returns a random number when sent the text "temp" via Bluetooth serial.
"""

import MySQLdb
import sys

def insertIntoDB(myID,nmFile,MY_USR,MY_PWD):
    # Open database connection
    db = MySQLdb.connect("localhost",MY_USR,MY_PWD,"login")
    # prepare a cursor object using cursor() method
    cursor = db.cursor()
    # Prepare SQL query to INSERT a record into the database.
    sql = """INSERT INTO transaksi(IDUSER_TR,FILE)  VALUES ('%s', '%s')"""%(myID,nmFile)
    try:
        # Execute the SQL command
        cursor.execute(sql)
        # Commit your changes in the database
        db.commit()
    except:
        # Rollback in case there is any error
        db.rollback()

    # disconnect from server
    db.close()
    
    
insertIntoDB(sys.argv[1],sys.argv[2],sys.argv[3],sys.argv[4])
