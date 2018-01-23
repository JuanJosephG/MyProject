import sys
import MySQLdb
import memcache

memc = memcache.Client(['127.0.0.1:11211'], debug=1);

try:
    conn = MySQLdb.connect (host = "13.58.55.118",
                            user = "root",
                            passwd = "centos",
                            db = "noticias")
except MySQLdb.Error, e:
     print "Error %d: %s" % (e.args[0], e.args[1])
     sys.exit (1)

popularnews = memc.get('top10news')

if not popularnews:
    cursor = conn.cursor()
    cursor.execute('select Id_data,Titulo_data from data order by Contador_data desc limit 10')
    rows = cursor.fetchall()
    memc.set('top10news',rows,70)
    print "Updated memcached with MySQL data"
else:
    print "Loaded data from memcached"
    for row in popularnews:
        print "%s, %s" % (row[0], row[1])
