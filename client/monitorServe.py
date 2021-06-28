#!/usr/bin/python3
import time
import sys
import json
import subprocess
import requests
from collections import Counter

name = ''
target = '1'

def shell(cmd):
 a = subprocess.Popen(str(cmd), shell=True, stdout=subprocess.PIPE).stdout.read().decode('utf-8')
 return a

def ip():
 a = shell('ifconfig | grep inet').splitlines()
 data = []
 for i in a:
  data.append([j for j in i.split()][1])
 return data

def check_loc(ip=""):
 a = requests.get('https://ipinfo.io/'+ip).content.decode('utf-8')
 country = json.loads(a)['country']
 city = json.loads(a)['city']
 return country, city

def storage():
 #/dev/vda1        39G  2.4G   37G   7% /
 data = []
 a = shell("df -h -t ext4 | grep /").splitlines()[0].split()
 rawdata = []
 for i in a:
  if i:
   rawdata.append(i)
 data = {"storage":rawdata[1],"percent":rawdata[4]}
 return data

def ram():
#Mem:        2028640      368944      104272        2832     1555424     1468920
#['Mem:', '2028640', '389388', '83332', '2832', '1555920', '1448476']
 cal = [i for i in shell('free | grep "Mem:"').split() if i]
 read = [i for i in shell('free -h | grep "Mem:"').split() if i]
 percent = str(int(cal[2])*100/int(cal[1])).split('.')[0]+"%"
 storage = read[1]
 return {"storage":storage,"percent":percent}

def port():
 a = shell('netstat -tulnp | grep :[1-9]').splitlines()
 a2 = [[c for c in b.split(' ') if c] for b in a]
 result = []
 for a3 in a2:
  protocol, port, pid = a3[0], a3[3].split(':')[-1], a3[-1].split('/')[-1]
  if a3[0] == 'tcp':
   if a3[3].split('.')[0] != '127':
    result.append([protocol, port, pid])
  elif a3[0] == 'tcp6':
   result.append([protocol, port, pid])
  elif a3[0] == 'udp':
   if a3[3].split('.')[0] != '127':
    result.append([protocol, port, pid])
  elif a3[0] == 'udp6':
   result.append([protocol, port, pid])
 #check same array
 nomer = []
 for i in result:
  nomer.append(i[1])
 nomer_se = sorted(list(dict.fromkeys(nomer)))
 hasil = []
 for j in nomer_se:
  for i in result:
   if j == i[1]:
    hasil.append(i)
 return hasil

def ssh_live():
#[['infra', 'pts/0', 'expbig.bisaai.id', 'Fri', 'Jun', '26', '14:34', 'still', 'logged', 'in']]
# a = [[j[0],j[2],j[5]+' '+j[4]+' '+j[6] for j in i.split() if j] for i in shell("last | grep logged").splitlines()]
 data = []
 for i in shell("last | grep logged").splitlines():
  j = []
  for k in i.split():
   if k:
    j.append(k)
  data.append([j[0],j[2],'%s %s %s' % (j[4],j[5],j[6],)])
 return data

def ssh_failed():
#Jun 26 14:58:15 strongpapazola sshd[4375]: Failed password for invalid user root from 222.186.31.83 port 56696 ssh2
 a = shell('cat /var/log/auth.log | grep ": Failed" | grep "from" | tail -n 10').splitlines()
 data = []
 for i in a:
  i = i.split()
  ir = []
  for j in range(len(i)):
   if i[j] == 'from':
    ir.append(i[j-1])
    ir.append(i[j+1])
    ir.append(i[0]+' '+i[1]+' '+i[2])
  data.append(ir)
 return data

def ssh_success():
#Jun 26 14:58:15 strongpapazola sshd[4375]: Failed password for invalid user root from 222.186.31.83 port 56696 ssh2
 a = shell('cat /var/log/auth.log | grep ": Accepted" | grep "from" | tail -n 10').splitlines()
 data = []
 for i in a:
  i = i.split()
  ir = []
  for j in range(len(i)):
   if i[j] == 'from':
    ir.append(i[j-1])
    ir.append(i[j+1])
    ir.append(i[0]+' '+i[1]+' '+i[2])
  data.append(ir)
 return data

def service_list():
#  systemd-networkd.service             loaded active running Network Service
#  systemd-random-seed.service          loaded active exited  Load/Save Random Seed
#  systemd-remount-fs.service           loaded active exited  Remount Root and Kernel File Systems
 service_list = shell("systemctl list-units --type=service --all | grep service").splitlines()
 service_list = [[a for a in i.split() if a] for i in service_list]
 raw = []
 for i in service_list:
  liner = []
  for j in i:
   scan = 1
   if len(j) == 1:
    if scan == 1:
     continue
     scan += 1
   liner.append(j)
  raw.append(liner)
 return raw

def send_data(data):
 return requests.post('https://expbig.bisaai.id/monitorServe/input/publik', verify=False, json=data)

def send_data_command(data):
 return requests.post('https://expbig.bisaai.id/monitorServe/input/publik_command', verify=False, json=data)

def date():
 date = [i for i in shell('date').splitlines()[0].split() if i]
 data = ' '.join(date)
 return data

#===============================================
# EXECUTE

def e_service_list(data, stat):
 data = json.loads(data)['service_list']
 if stat == True:
  for i in data.split(',,,'):
   i = i.split('...')
   if i[2] == '2':
    return True
  return False
 else:
  for i in data.split(',,,'):
   i = i.split('...')
   if i[2] == '2':
    if i[1] == '2':
     shell('systemctl stop '+i[0])
    elif i[1] == '1':
     shell('systemctl start '+i[0])
    else:
     print('galat')

def public_shell(data):
 data = json.loads(data)['shell']
 shell(str(data))
 return data


if __name__ == "__main__":
 while True:
  data = {"name":name,"ip":ip(),"date":date(),"target":target,"disk":storage(),"ram":ram(),"port":port(),"ssh_live":ssh_live(),"ssh_failed":ssh_failed(),"ssh_success":ssh_success(),"service_list":service_list()}
  send = send_data(data).content.decode('utf-8')
  print('===============================')
  print(data)
  print('- - - - - - - - - - - - - - - -')
  print(send)
  print('- - - - - - - - - - - - - - - -')
  print(public_shell(send))
  if e_service_list(send, True) == True:
   e_service_list(send, False)
   send_data_command({"name":name})
   send_data(data)
  time.sleep(20)
# return list(set(map(lambda x: x[0], ports)))

