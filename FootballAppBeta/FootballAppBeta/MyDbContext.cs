using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Windows.UI;
using Microsoft.EntityFrameworkCore;
using Pomelo.EntityFrameworkCore.MySql;

namespace FootballAppBeta
{

    class MyDbContext : DbContext
    {
        protected override void OnConfiguring(DbContextOptionsBuilder optionsBuilder)
        {

            optionsBuilder.UseMySql(
                    "server=localhost;" +                     // Server name
                    "port=3306;" +                            // Server port
                    "user=c_sharp_dev;" +                     // Username
                    "password=c_sharp_dev;" +                 // Password
                    "database=schoolvoetbal4s;"       // Database name
                    , Microsoft.EntityFrameworkCore.ServerVersion.Parse("8.0.21-mysql") // Version
                    );


            // optionsBuilder.UseSqlServer(@"Server=Localhost;Database=schoolvoetbal4s;Trusted_Connection=True;");
        }
        public DbSet<GamblingTurn> GamblingTurns { get; set; }
        public DbSet<User> Users { get; set; }
    }
}
