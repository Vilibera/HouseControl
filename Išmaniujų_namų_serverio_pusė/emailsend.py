import smtplib
import os

#EMAIL_ADDRESS = os.environ.get('EMAIL_USER')
#EMAIL_PASSWORD = os.environ.get('EMAIL_PASS')

with smtplib.SMTP('smtp.gmail.com',587) as smtp:
	smtp.ehlo()
	smtp.starttls()
	smtp.ehlo()
	
	smtp.login("housesystemalert@gmail.com","code")
	
	subject = 'Test mail'
	body = 'Alert message'
	msg = f'Subject: {subject}\n\n{body}'
	
	smtp.sendmail('housesystemalert@gmail,com','receipent address',msg)
