using System;
using System.Collections.Generic;
using System.Collections.Specialized;
using System.Net;
using System.Windows.Forms;
using Newtonsoft.Json;

namespace CSharpClient
{
    public partial class frmMain : Form
    {
        public frmMain()
        {
            InitializeComponent();
        }

        /// <summary>
        /// On double click on a datatable cell, load the entire leave object from REST API
        /// </summary>
        /// <param name="sender"></param>
        /// <param name="e"></param>
        private void tblLeaves_CellDoubleClick(object sender, DataGridViewCellEventArgs e)
        {
            int l_intLeaveId = Convert.ToInt32(this.tblLeaves.Rows[e.RowIndex].Cells[0].Value.ToString());
            LeaveDB l_objLeave = null;

            using (WebClient l_objClient = new WebClient())
            {
                l_objClient.BaseAddress = txtBaseURL.Text;
                try
                {
                   byte[] l_objResponse = l_objClient.UploadValues("leaves/" + l_intLeaveId.ToString(), new NameValueCollection()
                   {
                       { "login", txtLogin.Text },
                       { "password", txtPassword.Text }
                   });
                    string l_strResult = System.Text.Encoding.UTF8.GetString(l_objResponse);
                    l_objLeave = JsonConvert.DeserializeObject<LeaveDB>(l_strResult);
                }
                catch (WebException l_objException)
                {
                    MessageBox.Show(l_objException.Message);
                }
            }
            frmLeaveView l_objLeaveView = new frmLeaveView(l_objLeave);
            l_objLeaveView.ShowDialog();
        }

        /// <summary>
        /// Get the list of leaves for the connected user (REST API)
        /// </summary>
        /// <param name="sender"></param>
        /// <param name="e"></param>
        private void cmdGetLeaves_Click(object sender, EventArgs e)
        {
            using (WebClient l_objClient = new WebClient())
            {
                l_objClient.BaseAddress = txtBaseURL.Text;
                try
                {
                   byte[] l_objResponse = l_objClient.UploadValues("leaves", new NameValueCollection()
                   {
                       { "login", txtLogin.Text },
                       { "password", txtPassword.Text }
                   });
                    string l_strResult = System.Text.Encoding.UTF8.GetString(l_objResponse);
                    List<LeaveEmployee> l_lstEmployees = JsonConvert.DeserializeObject <List<LeaveEmployee>>(l_strResult);
                    this.tblLeaves.Rows.Clear();
                    foreach (LeaveEmployee l_objEmployee in l_lstEmployees) {
                        tblLeaves.Rows.Add(l_objEmployee.Id,
                            l_objEmployee.Status,
                            l_objEmployee.StartDate.ToString("d MMM yyyy"),
                            l_objEmployee.EndDate.ToString("d MMM yyyy"),
                            l_objEmployee.Duration,
                            l_objEmployee.Type);
                    }
                }
                catch (WebException l_objException)
                {
                    MessageBox.Show(l_objException.Message);
                }
            }
        }
    }
}
