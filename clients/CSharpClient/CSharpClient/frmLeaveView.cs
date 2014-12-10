using System;
using System.Windows.Forms;

namespace CSharpClient
{
    public partial class frmLeaveView : Form
    {
        /// <summary>
        /// Initialize the form and fill the controls with a leave object
        /// </summary>
        /// <param name="p_objLeave">Leave Object retrieved through REST)</param>
        public frmLeaveView(LeaveDB p_objLeave)
        {
            InitializeComponent();
            txtID.Text = p_objLeave.ToString();
            txtReason.Text = p_objLeave.Cause;
        }

        /// <summary>
        /// Close the windows when click on leave button
        /// </summary>
        /// <param name="sender"></param>
        /// <param name="e"></param>
        private void cmdClose_Click(object sender, EventArgs e)
        {
            Close();
        }
    }
}
